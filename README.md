# Arkanzax Website Replica

A complete static replica of the [Arkanzax](https://arkanzax.com) marketing agency homepage, built with pure HTML, CSS, and JavaScript — ready to deploy on **GitHub Pages**.

## 🚀 Live Demo

Once deployed: `https://<your-username>.github.io/<repo-name>/arkanzax-replica/`

---

## 📁 Project Structure

```
arkanzax-replica/
├── index.html          # Main page (all sections)
├── css/
│   └── style.css       # Full stylesheet with animations
├── js/
│   └── main.js         # Interactive JS (slider, nav, particles, etc.)
├── assets/
│   ├── logo.png        # Arkanzax logo
│   ├── hero-img.png    # Hero section image
│   ├── analysis.png    # Analysis graphic
│   └── star.svg        # Marquee star icon
└── README.md
```

---

## ✨ Features

| Feature | Detail |
|---|---|
| **Sticky Header** | Glassmorphism navbar with scroll effect |
| **Hero Section** | Dark gradient + canvas particle system + floating cards |
| **Marketing Challenges** | 6-card grid with 3D hover tilt |
| **Why Arkanzax Table** | 3-column comparison vs. Traditional & Self-Serve |
| **Marquee Ticker** | Infinite scrolling service tags |
| **Services Grid** | 6-card grid with gradient icons + hover animations |
| **Testimonials Slider** | Auto-play, touch swipe, dot navigation |
| **Blog Section** | Dark section with hover cards |
| **CTA Section** | Email form with success feedback |
| **Footer** | 4-column with social links, nav, contact |
| **Scroll Reveal** | Intersection Observer animations throughout |
| **Responsive** | Mobile-first, breakpoints at 640px / 900px / 1100px |

---

## 🛠 Tech Stack

- **HTML5** — Semantic, SEO-optimized
- **CSS3** — Custom properties, Grid, Flexbox, animations
- **Vanilla JavaScript** — No frameworks or dependencies
- **Google Fonts** — Outfit + Inter
- **Font Awesome 6** — Icons via CDN

---

## 📦 Deploying to GitHub Pages

### Option A — Deploy the whole repo
1. Push this repo to GitHub
2. Go to **Settings → Pages**
3. Set **Source** to `main` branch, `/ (root)` folder
4. Access at: `https://<user>.github.io/<repo>/arkanzax-replica/`

### Option B — Deploy only this subfolder
1. Copy the `arkanzax-replica/` folder contents into a new repo root
2. Rename `arkanzax-replica/index.html` stays as `index.html`
3. Push & enable GitHub Pages on `main / root`
4. Access at: `https://<user>.github.io/<repo>/`

> **Note:** The `.nojekyll` file is already included to prevent Jekyll from ignoring files that start with `_`.

---

## 🎨 Design System

| Token | Value |
|---|---|
| Primary color | `#31a5a1` (Arkanzax teal) |
| Secondary | `#193978` (dark navy) |
| Accent blue | `#3b9ef5` |
| Accent purple | `#7c3aed` |
| Dark bg | `#0d0d0d` |
| Light bg | `#F0EFE9` |
| Heading font | Outfit (300–900) |
| Body font | Inter (300–700) |

---

## 📝 License

This project is a **front-end UI replica** for educational and portfolio purposes. All brand names and trademarks belong to their respective owners.
