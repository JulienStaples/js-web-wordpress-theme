// Run from the theme root after npm install --save-exact gsap@3.15.1.
// Commit the copied browser asset so deployment does not need node_modules.
const fs = require('node:fs');
const path = require('node:path');
const root = path.resolve(__dirname, '..');
const source = path.join(root, 'node_modules', 'gsap');
const pkg = JSON.parse(fs.readFileSync(path.join(source, 'package.json'), 'utf8'));
if (pkg.version !== '3.15.1') throw new Error('Expected GSAP 3.15.1; found ' + pkg.version);
const destination = path.join(root, 'assets', 'js', 'vendor');
fs.mkdirSync(destination, { recursive: true, mode: 0o755 });
// WordPress must be able to traverse these directories.
fs.chmodSync(path.dirname(destination), 0o755);
fs.chmodSync(destination, 0o755);
fs.copyFileSync(path.join(source, 'dist', 'gsap.min.js'), path.join(destination, 'gsap.min.js'));
fs.chmodSync(path.join(destination, 'gsap.min.js'), 0o644);
for (const name of fs.readdirSync(source)) {
    if (/^license(?:\.|$)/i.test(name) && fs.statSync(path.join(source, name)).isFile()) {
        fs.copyFileSync(path.join(source, name), path.join(destination, name));
        fs.chmodSync(path.join(destination, name), 0o644);
    }
}
console.log('GSAP ' + pkg.version + ' copied to assets/js/vendor/gsap.min.js');
