import re

with open('hosting-domain.html', 'r', encoding='utf-8') as f:
    html = f.read()

prices = {
    'panel-shared': {'Starter': '1.99', 'Business': '8.99', 'Premium': '15.99'},
    'panel-wordpress': {'Startup': '2.99', 'GrowBig': '8.99', 'GoGeek': '15.99'},
    'panel-aspnet': {'Economy': '3.99', 'Deluxe': '10.99', 'Ultimate': '25.99'},
    'panel-linuxreseller': {'Bronze': '9.80', 'Silver': '13.73', 'Gold': '18.13'},
    'panel-email': {'Business Email': '3.45', 'Enterprise Email': '14.99', 'Premium Email': '24.99'},
    'panel-winreseller': {'Bronze': '12.80', 'Silver': '16.73', 'Gold': '21.13'},
    'panel-linuxvps': {'Launch': '4.99', 'Enhance': '11.99', 'Grow': '24.99'}
}

# Add pricing header to h3 + p to group them cleanly
for tab_id, pkgs in prices.items():
    panel_pattern = re.compile(f'(<div class="svc-panel.*?id="{tab_id}".*?>)(.*?)(</div>\\s*<div class="svc-panel|</div>\\s*</div>\\s*</div>\\s*</section>)', re.DOTALL)
    match = panel_pattern.search(html)
    if not match:
        print(f"Could not find panel {tab_id}")
        continue
    
    panel_start = match.group(1)
    panel_content = match.group(2)
    panel_end = match.group(3)
    
    for pkg_name, price in pkgs.items():
        pkg_pattern = re.compile(rf'(<h3>\s*{pkg_name}\s*</h3>\s*<p class="plan-sub".*?>.*?</p>)', re.DOTALL | re.IGNORECASE)
        replacement = f'<div class="pricing-header">\n\\1\n</div>\n                            <div class="pricing-price">\n                                <span class="price-value">${price}</span>\n                                <span class="price-currency">USD</span>\n                                <span class="price-period">/mo</span>\n                            </div>'
        
        panel_content = pkg_pattern.sub(replacement, panel_content, count=1)
        
    html = html[:match.start()] + panel_start + panel_content + panel_end + html[match.end():]

# TLDs replacement
tld_search = re.compile(r'<div class="tld-row reveal-up">.*?</div>', re.DOTALL)
new_tlds = """<div class="tld-row reveal-up">
                    <span><strong>.com</strong> $15.00/yr</span>
                    <span><strong>.xyz</strong> $3.00/yr</span>
                    <span><strong>.net</strong> $16.00/yr</span>
                    <span><strong>.org</strong> $15.50/yr</span>
                </div>"""
html = tld_search.sub(new_tlds, html)

with open('hosting-domain.html', 'w', encoding='utf-8') as f:
    f.write(html)
    
print("Updated all pricing in hosting-domain.html successfully.")
