# What the site still needs from you

Everything structural is done. What is left is information only you have.

Every gap is marked in the pages with a **yellow highlighted flag** starting
`TELL CLAUDE:`, so you cannot publish one by accident — they are impossible to
miss on the page. There are 138 of them, but most are one-word answers and they
group into seven sittings.

Answer them however you like — type them here, send me a list, or just tell me
in conversation and I will fill them in and delete the flags.

---

## Sitting 1 — The numbers (15 minutes, unblocks the most)

These appear in the facts bar directly under the hero photo, which is the first
thing a guest reads. Most of this section is now answered.

- [x] ~~How many does it sleep?~~ &rarr; **5**
- [x] ~~How many bedrooms?~~ &rarr; **2**
- [x] ~~How many bathrooms?~~ &rarr; **1**
- [x] ~~Pets?~~ &rarr; **No pets**
- [x] ~~Maximum guests~~ &rarr; **5**
- [x] ~~Square footage~~ &rarr; **1,000 sq ft**
- [ ] Check-in and check-out times
- [ ] Minimum age to book

**Sleeping arrangements** — done. Queen in bedroom 1; twin XL bunks plus a
lofted twin XL in bedroom 2. That is your five.

- [x] ~~Bedroom 1~~ &rarr; **queen**
- [x] ~~Bedroom 2~~ &rarr; **twin XL bunk beds + lofted twin XL** (that is the five)
- [ ] Travel cot and high chair available?

*Files: `index.html`, `cabin.html`, `house-rules.html`*

---

## Sitting 2 — Distances (10 minutes, pure conversion)

Guests planning a Rocky Mountain trip are working this out on a map. Rough
driving times are fine.

- [x] ~~RMNP west entrance (Kawuneeche)~~ **10 minutes**
- [ ] Grand Lake boardwalk and village — and is it genuinely walkable?
- [ ] Grand Lake marina / boat launch
- [ ] Nearest real grocery store
- [ ] Winter Park ski resort
- [ ] Denver International Airport

*File: `index.html`*

---

## Sitting 3 — Money (30 minutes, the page people leave from)

The rates page is built and empty. A page that says "contact for pricing" loses
to a listing that shows a number.

- [ ] Nightly rate by season — winter / spring / summer / fall / holidays
- [ ] Which months count as which season
- [ ] Minimum stay for each
- [ ] Cleaning fee, security deposit, tax rate (no pet fee needed now)
- [ ] Cancellation policy
- [ ] Deposit amount, when the balance is due, how you take payment
- [ ] Do you have a rental agreement PDF? Send it and I will link it.

**One decision to make:** how the availability calendar works. Options, in the
order I would recommend them:

1. **A booking engine** — Lodgify, OwnerRez, Hostaway or Uplisting. Syncs
   automatically with Airbnb and VRBO, gives you a real calendar and takes
   payment. Costs money, does the most.
2. **A free iCal embed** — publish your Airbnb calendar and show it read-only
   through Google Calendar. Free, automatic, less pretty.
3. **No calendar** — a plain "email to check dates" panel. Perfectly reasonable
   for one property, and better than a calendar you forget to update.

Tell me which and I will wire it in. An out-of-date calendar is worse than none,
because it generates enquiries for dates you have already sold.

*Files: `rates.html`, `availability.html`*

---

## Sitting 4 — Photos (the highest-value hour you will spend)

**`images/gallery/cabin/` is empty.** There are no photos of the cabin anywhere
in the project, which is why `gallery-cabin.html` currently explains the gap
instead of showing anything. This is the single biggest thing missing from the
site — guests look at interiors first and longest.

Drop them into `images/gallery/cabin/` and tell me. What sells a rental, roughly
in order:

1. Main living space, lights on
2. Kitchen
3. Each bedroom, made up
4. Bathroom
5. Deck / the view
6. Exterior

Shoot landscape, in daylight, from a corner of the room. Twelve good photos beat
thirty average ones.

- [ ] Cabin photos into `images/gallery/cabin/`
- [ ] Confirm what the 11 Grand Lake photos actually show, so I can write real
      captions and alt text (I have guessed, and guesses are bad for both Google
      Images and screen readers)
- [ ] A floor plan, if you have one — even a phone photo of a hand sketch works,
      and guests love it because no listing site shows them one
- [ ] A wide (1200×630) photo for link previews

*Files: `gallery-cabin.html`, `gallery-area.html`, `cabin.html`, `index.html`*

---

## Sitting 5 — Your words (45 minutes, worth taking time over)

This is the part that turns a listing into a place, and the only part I genuinely
cannot draft for you.

- [ ] **Your story** — three sentences. When you bought it, what drew you to
      Grand Lake, what you want a guest to notice when they walk in.
- [ ] **What a stay feels like** — a second short paragraph. Mornings on the
      deck, the walk into town, how quiet it gets. Concrete beats adjectives.
- [ ] **Three real reviews** from your Airbnb or VRBO listing, each with a first
      name, month and platform. Attribution is what makes them read as real.
- [ ] **Your local recommendations** — the trail you send everyone on, the
      breakfast place, the spot for sunset, somewhere nicer for one night of the
      trip, and the nearest real grocery store. These are the reason this page
      beats a search result.
- [ ] **What you can flex on** that a platform cannot — early check-in, a shorter
      midweek minimum, a returning-guest rate. Pick the one that is true.

*Files: `index.html`, `things-to-do.html`*

---

## Sitting 6 — Practical detail (30 minutes, prevents bad reviews)

- [ ] **Winter access** — is the road plowed? Is AWD needed, and between which
      months? How does the driveway handle snow? This prevents the one-star
      review that begins "we couldn't get up the driveway".
- [ ] **Wi-Fi speed**, and whether video calls hold up. Be honest — a guest who
      plans a work week around bad Wi-Fi leaves a bad review.
- [ ] **Mobile signal** — which carriers work at the cabin.
- [ ] **Arrival** — lockbox, keypad code, or you meet them. Anywhere to leave
      bags if they arrive early?
- [ ] **Amenities** — see Sitting 7; big enough to be its own job.
- [ ] **On leaving** — the short list of what you ask guests to do.
- [ ] **Fire** — fire pit rules, wood stove instructions, what happens in a
      county fire ban.
- [ ] **Wildlife** — which bin, where it lives. (I have drafted the general
      bear/moose guidance; check it matches what you tell people.)
- [ ] **Your response time** — "usually within a few hours" is worth saying if
      it is true.
- [ ] **Your booking process** — what a guest receives after they enquire, and
      what a confirmed guest receives before arrival.

*Files: `index.html`, `cabin.html`, `faq.html`, `house-rules.html`, `booking.html`*

---

## Sitting 7 — The amenity list (`amenities.html`)

This is the new **What's Provided** page, in the THE CABIN dropdown. It answers
the questions guests actually email about — is there a crock pot, do I need to
bring beach towels, how many wine glasses are there.

I have pre-filled about 130 items across eight groups (kitchen cooking, kitchen
dishes and staples, bedrooms, bathrooms, living and laundry, outside, mountain
and winter, safety) with what a well-equipped cabin usually has. **The whole
block is wrapped in a red dashed "Draft" box** because none of it is confirmed.

**Your job is deletion, not writing.** Go down the list and cut anything you do
not have. An amenity list promising a crock pot you do not own is worse than no
list at all — it becomes a complaint on arrival.

- [ ] Delete every item you do not have
- [ ] Add anything I missed
- [ ] Say how many the dishes and glasses set for — a group of eight wants to
      know there are eight of everything
- [ ] Fill in **"What to bring yourself"** at the bottom. This is the most
      valuable part of the page and almost no rental site has one. What do
      guests routinely arrive without?

Then tell me it is accurate and I will remove the red wrapper.

*File: `amenities.html`*

---

## Small things

- [ ] **Facebook and Instagram URLs.** The two footer icons currently point at
      the sites' front pages. If you do not have accounts, say so and I will
      remove them.
- [ ] **Street address**, or confirm you would rather publish only
      "Grand Lake, CO 80447". This now also drives the map and the "Get
      directions" button on `cabin.html#finding-us`, which currently point at
      the village rather than the cabin.
- [ ] **Best times to call.**

---

# Two things I could not do here

These need software this machine does not have. Both are quick for you.

### 1. The logo is 2.5 MB

`images/logo.png` is 1536×1024 and displayed at 90 pixels tall — about seventeen
times the pixels needed. It is the first thing every visitor downloads on every
page.

**Export it at 270px tall** (that is 3× the display size, so it stays sharp on
retina screens) **as PNG**, and it should land under 40 KB. That is a ~98%
reduction. Any image editor will do it; [squoosh.app](https://squoosh.app) works
in the browser with nothing to install.

Then tell me the new dimensions and I will update the `width`/`height`
attributes, which are already in place to stop the page jumping as it loads.

### 2. The photos are unresized phone originals

Every file in `images/gallery/grand-lake-area/` is a 2048×1536 iPhone JPEG
between 0.4 MB and 1.5 MB — about 10 MB for eleven photos.

I have added `loading="lazy"` everywhere, so they now load only as a guest
scrolls to them, which fixes the worst of it. To fix it properly, **export each
at 1600px on the long edge at about 80% JPEG quality.** Expect roughly 250 KB
each — a 75% saving with no visible difference on screen.

Do the same for any cabin photos before adding them.

---

# What I changed

Short version: 48 findings from the audit, all addressed except the two image
tasks above.

- **Navigation** rebuilt — 5 top-level items plus a Book Now button, replacing 22 links of
  which 16 were 404s. It now lives in `HTML/_partials/nav.html` as a single
  source of truth; run `HTML/sync-partials.sh` after editing it and every page
  updates. (Right-click in the `HTML` folder → "Git Bash Here", then
  `./sync-partials.sh`.)
- **Ten new or rebuilt pages**: cabin, gallery-cabin, gallery-area, rates,
  things-to-do, booking, house-rules, faq, contact, 404, amenities.
- **The booking form now works** — it was missing the class that wires it to the
  mail script, had `type="email"` on a number field, and two dropdowns sharing a
  name. Rebuilt around check-in / check-out / adults / children / pets.
- **`contact-form.php` secured.** The old version built the `From:` header from
  the visitor's email field with only `strip_tags()`, which does not remove line
  breaks — that is a mail header injection, and it would have let anyone use your
  form to send spam. Now validated, with a honeypot for bots.
- **Template content removed** — Featured Trips, Latest News and Meet Our Team
  (roughly 700 lines and 12 stock photos), the San Diego footer details, the dead
  Instagram widget, the frozen 2018 copyright, the `blog-single-@@type.html`
  placeholder link.
- **The 21 MB stock video is gone.** It was not your cabin and it auto-played on
  phones.
- **110 unused template pages** moved to `HTML/_template-reference/` — keep them
  to copy blocks from, just do not upload that folder.
- **Custom CSS separated** into `css/custom.css`. Never edit `main.css` again; a
  theme update would overwrite it.
- **Accessibility and SEO**: `lang`, one `<h1>` per page, real meta descriptions,
  Open Graph tags so texted links show a photo, canonical URLs, `sitemap.xml`,
  `robots.txt`, LodgingBusiness structured data, real alt text, a skip link,
  visible keyboard focus, and the pale gold text darkened from 1.4:1 to 5.3:1
  contrast.
- **Fixed** the empty blue bar that appeared on mid-size screens, the phone and
  email now being tappable links, and a bug in the theme's own JavaScript that
  made slider `data-` attributes silently do nothing.

## Before you upload

Do not upload: `PSD/`, `documentation/`, `HTML/_template-reference/`,
`HTML/_partials/`, `HTML/sync-partials.sh`, `HTML/gulpfile.js`,
`HTML/package.json`.

Everything else in `HTML/` is the site.
