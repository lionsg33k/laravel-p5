# Tailwind Stopped Working After Installing Breeze

## Root Cause

The project was using a **mixed Tailwind setup**:

- `resources/css/app.css` uses **Tailwind v4 syntax** (`@import "tailwindcss";`, `@theme`, `@source`)
- `vite.config.js` uses **Tailwind v4 Vite plugin** (`@tailwindcss/vite`)
- but `package.json` had `tailwindcss` pinned to **v3** (`^3.4.19`)

This version mismatch can make Tailwind classes stop compiling correctly.

## Fix Applied

Updated `package.json`:

- `tailwindcss` from `^3.4.19` -> `^4.1.12`

Then reinstalled dependencies and rebuilt assets:

- `npm install`
- `npm run build`

Build now succeeds and CSS is generated:

- `public/build/assets/app-*.css`

## Why This Works

Tailwind must use the same major version across:

- CSS syntax in `resources/css/app.css`
- Vite plugin in `vite.config.js`
- `tailwindcss` dependency in `package.json`

Your project is configured for Tailwind v4, so the dependency also must be v4.

## If It Breaks Again

1. Check versions:
   - `npm ls tailwindcss @tailwindcss/vite`
2. Make sure both are v4-compatible.
3. Reinstall:
   - `rm -rf node_modules package-lock.json`
   - `npm install`
4. Rebuild:
   - `npm run build`
5. For local dev:
   - `npm run dev`

## Quick Verification

- Ensure layout includes:
  - `@vite(['resources/css/app.css', 'resources/js/app.js'])`
- Open app and confirm Tailwind classes (for example `bg-alpha`, `rounded-xl`, `text-sm`) are styled.
