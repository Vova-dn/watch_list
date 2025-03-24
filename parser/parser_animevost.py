import json
import sys

from bs4 import BeautifulSoup
import requests
import zstandard as zstd

def get_text_after_label(infos, label):
    for info in infos:
        if info.strong and label in info.strong.text:
            return info.text.split(":", 1)[1].strip()  # Берем текст после ":"
    return "Не найдено"

def parse_anime(anime_div):
    title_tag = anime_div.find('h2').find('a')
    title = title_tag.text if title_tag else None

    image_tag = anime_div.find('img', class_='imgRadius')
    image_url = image_tag['src'] if image_tag else None

    infos = anime_div.find_all('p')
    # print(info)

    type=get_text_after_label(infos, "Тип")
    episodes = get_text_after_label(infos, "Количество серий")

    anime_content={
        "name": title,
        "Photo": image_url,
        "type": type,
        "epizodes": episodes,
    }
    return anime_content


name=sys.argv[1]
# name="Стальной алхимик"
url="https://animevost.org/"

headers = {
     "accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8",
    "accept-encoding": "gzip, deflate, br, zstd",
    "accept-language": "uk-UA,uk;q=0.9",
    "cache-control": "max-age=0",
    "priority": "u=0, i",
    "sec-ch-ua": '"Not A(Brand";v="8", "Chromium";v="132", "Brave";v="132"',
    "sec-ch-ua-mobile": "?0",
    "sec-ch-ua-platform": '"Windows"',
    "sec-fetch-dest": "document",
    "sec-fetch-mode": "navigate",
    "sec-fetch-site": "none",
    "sec-fetch-user": "?1",
    "sec-gpc": "1",
    "upgrade-insecure-requests": "1",
    "user-agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36"
}

page=requests.get(url,headers=headers)
# print(page.status_code)
animes=[]
for i in range(1,6):
    data = {
        "do": "search",
        "subaction": "search",
        "search_start": i,
        "story": name,
    }

    response = requests.post(url, data=data)
    # print(response.text)
    soup=BeautifulSoup(response.text, "html.parser")
    # print(soup)
    anime_divs=soup.find_all('div', class_='shortstory')

    for anime_div in anime_divs:
        # print(anime_div)
        anime=parse_anime(anime_div)
        animes.append(anime)

    if anime_divs is None:
        break

print(json.dumps(animes, ensure_ascii=False))
