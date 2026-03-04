import urllib.request, re

urls = {
    'Linux Cloud': 'https://cloud.sovlow.com/cart.php?gid=6',
}

for name, url in urls.items():
    try:
        req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
        html = urllib.request.urlopen(req).read().decode('utf-8')
        items = re.findall(r'<h3 class="package-name">(.*?)</h3>.*?<div class="price.*?>(.*?)</div>', html, re.DOTALL | re.IGNORECASE)
        print(f'--- {name} ---')
        for item in items:
            pkg = item[0].strip()
            price_html = item[1]
            price = re.sub('<[^<]+>', ' ', price_html).replace('&nbsp;', ' ').strip()
            price = re.sub(' +', ' ', price)
            print(f'{pkg}: {price}')
    except Exception as e:
        print(f'Error fetching {name}: {e}')
