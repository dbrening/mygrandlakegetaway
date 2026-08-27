#!/usr/bin/env bash
#
# sync-partials.sh — push the shared header, nav and footer into every page.
#
# WHY THIS EXISTS
#   These are plain static HTML files with no build step, so the navigation
#   would otherwise be copy-pasted into eleven pages and drift apart. Instead
#   each page carries marker comments:
#
#       <!-- @partial:nav -->   ...generated, do not edit...   <!-- @end:nav -->
#
#   and this script replaces whatever is between them with the contents of
#   _partials/nav.html. Edit the partial, run this, every page updates.
#
# HOW TO RUN (Windows)
#   Right-click in the HTML folder -> "Git Bash Here", then:
#       ./sync-partials.sh
#
#   Or from VS Code's terminal, if it is set to Git Bash:
#       bash sync-partials.sh
#
# SAFE TO RUN ANY TIME. It only touches text between markers. Everything you
# write outside the markers is left alone.

set -euo pipefail
cd "$(dirname "$0")"

PARTIALS_DIR="_partials"
PARTIALS="topline nav footer"

if [ ! -d "$PARTIALS_DIR" ]; then
	echo "error: $PARTIALS_DIR/ not found. Run this from the HTML folder." >&2
	exit 1
fi

changed=0
scanned=0

for page in *.html; do
	[ -e "$page" ] || continue
	scanned=$((scanned + 1))

	# Which nav item should be highlighted on this page? Read the marker
	# <!-- @page:cabin --> near the top of the file.
	active_key="$(sed -n 's/.*<!-- *@page: *\([a-z0-9-]*\) *-->.*/\1/p' "$page" | head -1)"

	page_changed=0

	for name in $PARTIALS; do
		src="$PARTIALS_DIR/$name.html"
		[ -f "$src" ] || { echo "warning: missing $src" >&2; continue; }

		grep -q "@partial:$name" "$page" || continue

		# The opening and closing markers must be on separate lines. If they
		# share one, the splice below would insert content outside the markers
		# and duplicate it on every subsequent run.
		if grep -q "@partial:$name.*@end:$name" "$page"; then
			echo "error: $page has @partial:$name and @end:$name on the same line." >&2
			echo "       Put them on separate lines and run this again." >&2
			exit 1
		fi

		if ! grep -q "@end:$name" "$page"; then
			echo "error: $page opens @partial:$name but never closes it with @end:$name." >&2
			exit 1
		fi

		# Mark the active nav item for this page before splicing it in.
		tmp_partial="$(mktemp)"
		if [ "$name" = "nav" ] && [ -n "$active_key" ]; then
			sed "s|<li data-nav=\"$active_key\">|<li data-nav=\"$active_key\" class=\"active\">|; \
			     s|<li data-nav=\"$active_key\" class=\"nav-book\">|<li data-nav=\"$active_key\" class=\"nav-book active\">|" \
			     "$src" > "$tmp_partial"
		else
			cp "$src" "$tmp_partial"
		fi

		tmp_page="$(mktemp)"
		awk -v name="$name" -v pf="$tmp_partial" '
			$0 ~ "@partial:" name {
				print
				while ((getline line < pf) > 0) print line
				close(pf)
				skipping = 1
				next
			}
			$0 ~ "@end:" name { skipping = 0 }
			!skipping { print }
		' "$page" > "$tmp_page"

		if ! cmp -s "$page" "$tmp_page"; then
			mv "$tmp_page" "$page"
			page_changed=1
		else
			rm -f "$tmp_page"
		fi
		rm -f "$tmp_partial"
	done

	if [ "$page_changed" -eq 1 ]; then
		echo "  updated  $page"
		changed=$((changed + 1))
	fi
done

echo ""
echo "Scanned $scanned pages, updated $changed."
