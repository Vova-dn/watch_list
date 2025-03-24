import sys
from http.client import responses

from bs4 import BeautifulSoup
import requests
import zstandard as zstd
import time
import json


# def decopress(text):
#     dctx = zstd.ZstdDecompressor()
#     stream_reader = dctx.stream_reader(text.content)
#     decompressed_data = stream_reader.read()
#     # print(decompressed_data.decode('utf-8'))
#     texto = decompressed_data.decode('utf-8')
#     return texto


def parse_anime(link):
    anime=requests.get(link,headers=headers)
    # anime=decopress(animezstd)
    soup=BeautifulSoup(anime.text, "html.parser")

    name=soup.select_one("h1")

    image_scope=soup.select_one(".c-poster img")
    photo=image_scope.get("src")
    type=soup.select_one(".line-container:nth-child(1) .value")

    if type.text == "Фильм":
        epizodes= 1
        time=soup.select_one(".line-container:nth-child(2) .value")

    else:
        epizodes=soup.select_one(".line-container:nth-child(2) .value")
        time=soup.select_one(".line-container:nth-child(3) .value")
        epizodes=epizodes.text


    rate=soup.select_one(".score-value")


    anime_content={
        "name": name.text,
        "Photo": photo,
        "type": type.text,
        "epizodes": epizodes,
        "time": time.text,
        "Rating": rate.text,
    }
    return anime_content


name=sys.argv[1]
# print(name)
# name="fullmetal alchemist"
url='https://shikimori.one/animes/autocomplete/v2?search='+name

i=0

headers = {
     "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8",
    "Accept-Encoding": "gzip, deflate, br, zstd",
    "Accept-Language": "uk-UA,uk;q=0.8",
    "Cache-Control": "max-age=0",
    "Priority": "u=0, i",
    "Referer": "https://search.brave.com/",
    # "Cookie": "_kawai_session=cfeOkdsrivZrWWULb79G8XZF7lN%2FbHbA5nHHLVOjRp6oVGGvmcpN4cg%2Fmtf4CpsAwUSlL2s3%2BUrUrAcjxntlY71btsAVRy1DvPLkNyfA8xFZzL4yJYGpScAMK2GcJS%2B0DL%2FsPLShGXkpQO8KHEOxg3oAg2YLzpMjAUrIN7sPVB6REHQCVvS%2B3DrapdV0LbIOTzlEoQ0suVkPaRiZJcGS%2FGe4voQL4uovMelQbIQO1uI3iPRZNVbsIKGYuyjRd13%2BHZJhYpkiu3uLM3wWCG%2FdhhXqfoFXkJ%2Bfa7QA4zYW6L2c9jIImRLg%2F2tXSNYA%2BxpxtFaj5BA%3D--h8T5F7qrLQd6M6lc--TZoZvnjAPgdOke19YqxjlA%3D%3D",
    "Sec-CH-UA": '"Brave";v="131", "Chromium";v="131", "Not_A Brand";v="24"',
    "Sec-CH-UA-Mobile": "?0",
    "Sec-CH-UA-Platform": '"Windows"',
    "Sec-Fetch-Dest": "document",
    "Sec-Fetch-Mode": "navigate",
    "Sec-Fetch-Site": "same-origin",
    "Sec-Fetch-User": "?1",
    "Sec-GPC": "1",
    "Upgrade-Insecure-Requests": "1",
    "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36"
}


page=requests.get(url,headers=headers)
# print(page.status_code)
# print(page.text)
# print(page.headers.get('Content-Encoding'))
# texto=decopress(page)
# print(texto)
soup=BeautifulSoup(page.text, "html.parser")
# print(soup)


anime_links=soup.find_all('a', class_='b-link')


animes=[]

for idx, anime_link in enumerate(anime_links, start=0):
    # print(f"{idx}. {anime_link['href']}")
    anime=parse_anime(anime_link['href'])
    animes.append(anime)
    time.sleep(0.1)

# print(animes)

print(json.dumps(animes, ensure_ascii=False))








