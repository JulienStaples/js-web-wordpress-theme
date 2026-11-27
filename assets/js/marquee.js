/* Step 6.1: diagonal entrance, exact approved velocity curve, seamless loop. */
;(() => {
  "use strict"

  const gsap = window.gsap
  const root = document.querySelector("[data-marquee]")
  if (!gsap || !root || !window.IntersectionObserver || !window.ResizeObserver) return

  const viewport = root.querySelector("[data-marquee-viewport]")
  const track = root.querySelector("[data-marquee-track]")
  const unit = root.querySelector("[data-marquee-unit]")
  const fill = root.querySelector("[data-marquee-fill]")
  const toggle = root.querySelector("[data-marquee-toggle]")
  const pauseIcon = toggle.querySelector("[data-marquee-pause]")
  const playIcon = toggle.querySelector("[data-marquee-play]")
  const reduced = window.matchMedia("(prefers-reduced-motion: reduce)")

  const DELAY = 0.17
  const FILL = 0.275
  const HOLD = 0.2
  const SLOWDOWN = 0.825
  const REVEAL = 0.11
  const FAST = 1200
  const CRUISE = 17
  const TOTAL = DELAY + FILL + HOLD + SLOWDOWN

  let enabled = false
  let visible = false
  let userPaused = false
  let finished = false
  let hasEntered = false
  let ticking = false
  let skipTick = false
  let period = 0
  let distance = 0
  let entrance
  let setX
  const clock = { elapsed: 0 }

  // Integrate the approved smoothstep velocity curve exactly. This avoids
  // frame-dependent drift and keeps both speed and acceleration continuous.
  function entranceDistance(elapsed) {
    const seconds = Math.max(0, elapsed - FILL)
    if (seconds <= HOLD) return FAST * seconds
    const p = Math.min(1, (seconds - HOLD) / SLOWDOWN)
    const integral = p - p ** 3 + 0.5 * p ** 4
    return FAST * HOLD + SLOWDOWN * (CRUISE * p + (FAST - CRUISE) * integral)
  }

  function positionTrack() {
    if (period > 0) setX(-period + (distance % period))
  }

  function removeCopies() {
    track.querySelectorAll("[data-marquee-copy]").forEach((copy) => copy.remove())
  }

  function measure() {
    if (!enabled) return
    const width = unit.getBoundingClientRect().width
    if (width <= 0) return
    period = width
    const needed = Math.ceil(viewport.clientWidth / period) + 1
    const current = track.querySelectorAll("[data-marquee-copy]").length
    if (current !== needed) {
      removeCopies()
      for (let i = 0; i < needed; i++) {
        const copy = unit.cloneNode(true)
        copy.removeAttribute("data-marquee-unit")
        copy.setAttribute("data-marquee-copy", "")
        copy.setAttribute("aria-hidden", "true")
        track.appendChild(copy)
      }
    }
    positionTrack()
  }

  function renderEntrance() {
    // Keep the strip fully white until the entrance delay has elapsed.
    const elapsed = Math.max(0, clock.elapsed - DELAY)
    if (elapsed < FILL) {
      const h = fill.offsetHeight
      const x = -h + ((root.clientWidth + h) * elapsed) / FILL
      fill.style.clipPath = `polygon(${-h}px 0, ${x}px 0, ${x + h}px 100%, ${-h}px 100%)`
      root.classList.add("is-filling")
      track.style.clipPath = "inset(0 100% 0 0)"
    } else {
      root.classList.remove("is-filling")
      fill.style.removeProperty("clip-path")
      const progress = Math.min(1, (elapsed - FILL) / REVEAL)
      // Clip the stationary viewport, not the translating belt.
      track.style.removeProperty("clip-path")
      viewport.style.clipPath = `inset(0 ${100 * (1 - progress)}% 0 0)`
      if (progress === 1) viewport.style.removeProperty("clip-path")
    }
    distance = entranceDistance(elapsed)
    positionTrack()
  }

  function cruiseTick(_time, deltaTime) {
    if (skipTick) {
      skipTick = false
      return
    }
    distance += (CRUISE * Math.min(deltaTime, 100)) / 1000
    // Keep the phase bounded during very long sessions.
    if (period > 0) distance %= period
    positionTrack()
  }

  function stopCruise() {
    if (ticking) gsap.ticker.remove(cruiseTick)
    ticking = false
  }

  function syncPlayback() {
    if (!enabled) return
    const shouldPlay = visible && !document.hidden && !userPaused && !reduced.matches
    if (!finished) {
      if (shouldPlay) entrance.play()
      else entrance.pause()
      return
    }
    if (shouldPlay && !ticking) {
      skipTick = true
      ticking = true
      gsap.ticker.add(cruiseTick)
    } else if (!shouldPlay) stopCruise()
  }

  function updateButton() {
    toggle.setAttribute(
      "aria-label",
      userPaused ? "Resume technology marquee" : "Pause technology marquee",
    )
    pauseIcon.toggleAttribute("hidden", userPaused)
    playIcon.toggleAttribute("hidden", !userPaused)
  }

  const resize = new ResizeObserver(() => {
    measure()
    if (enabled && !finished) renderEntrance()
  })

  function enable() {
    if (enabled || reduced.matches || !visible || document.hidden) return
    // Do not take away manual scrolling while someone is using the fallback.
    if (document.activeElement === viewport) return
    enabled = true
    finished = hasEntered
    hasEntered = true
    root.classList.add("is-animated")
    if (!finished) root.classList.add("is-filling")
    viewport.scrollLeft = 0
    viewport.removeAttribute("tabindex")
    toggle.hidden = false
    updateButton()
    setX = gsap.quickSetter(track, "x", "px")
    measure()
    if (!finished) renderEntrance()
    resize.observe(viewport)
    resize.observe(unit)
    if (!finished)
      entrance = gsap.to(clock, {
        elapsed: TOTAL,
        duration: TOTAL,
        ease: "none",
        paused: true,
        onUpdate: renderEntrance,
        onComplete: () => {
          finished = true
          syncPlayback()
        },
      })
    syncPlayback()
  }

  function disable() {
    if (!enabled) return
    stopCruise()
    if (entrance) entrance.kill()
    entrance = null
    resize.disconnect()
    enabled = false
    root.classList.remove("is-animated", "is-filling")
    removeCopies()
    gsap.set(track, { clearProps: "transform" })
    track.style.removeProperty("clip-path")
    viewport.style.removeProperty("clip-path")
    fill.style.removeProperty("clip-path")
    viewport.setAttribute("tabindex", "0")
    if (document.activeElement === toggle) viewport.focus({ preventScroll: true })
    toggle.hidden = true
  }

  toggle.addEventListener("click", () => {
    userPaused = !userPaused
    // A pause during the brief entrance settles the text first, so the
    // visitor is never left with a partially revealed inventory.
    if (userPaused && !finished) entrance.progress(1).pause()
    updateButton()
    syncPlayback()
  })

  const observer = new IntersectionObserver((entries) => {
    visible = entries[0].isIntersecting
    if (visible) enable()
    syncPlayback()
  })
  observer.observe(root)
  viewport.addEventListener("blur", enable)
  document.addEventListener("visibilitychange", () => {
    if (!document.hidden) enable()
    syncPlayback()
  })
  reduced.addEventListener("change", () => {
    if (reduced.matches) disable()
    else enable()
  })
})()
