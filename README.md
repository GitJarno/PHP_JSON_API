# Webstore_API_PHP
##Tehkää REST API kuvitteellisesta verkkokaupasta.


Verkkokaupassa on tuotteita joilla on id, tuotekuvan url, nimi, kategoria, hinta ja paino.

-Verkkokaupassanne tulee olla vähintään 10 tuotetta. 

-Kolmen eri tuotteen hinta tulee olla 18.90, 40,90, 99,90. Voitte vapaasti päättä minkä tuotteiden

-Kategorioita tulee olla vähintään 3 ja jokaisen tulee sisältää vähintään 2 tuotetta. 

-Tuotekuva voi olla mikä vain netistä otettu url jonka takaa löytyy tuotekuva.



Kannan sijaan tuotteet tulee toteuttaa PHP objektiin. Objekti voi olla suoraan rajapinnan sisällössä, mutta voitte myös tehdä erillisen json-tiedoston tuotteita varten.



Rajapinnan tulee palauttaa JSON muotoista dataa. Rajapinnan tulee ymmärtää parametreja. Kyselyt voidaan tehdä GET-muodossa. 

-Rajapinnallta voi kysyä tuotteita, jotka kuuluvat tiettyyn kategoriaan

-Rajapinnallta voi kysyä tuotetta tietyllä IDllä

-Rajapinnallta voi kysyä tuotteita, joiden hinta on alle [x]€

-Jos mitään parametria ei anneta, niin listataan kaikki tuotteet
