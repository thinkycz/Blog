# BI-WT1 - Úloha 2 - Blog B141 - zadání a hodnocení

POZOR, zadání není jeětě kompletní, do konce listopadu 2014 se může měnit.

## Zadání

Implementujte webovou aplikaci Blog podle požadavků [pozadavky.md]. Dodržte implementaci následujících tříd podle připravených rozhraní:

  * Cvut\Fit\BiWt1\BlogBundle\Entity\ImageInterface
  * Cvut\Fit\BiWt1\BlogBundle\Entity\UserInterface
  * Cvut\Fit\BiWt1\BlogBundle\Entity\PostInterface
  * Cvut\Fit\BiWt1\BlogBundle\Entity\TagInterface
  * Cvut\Fit\BiWt1\BlogBundle\Entity\FileInterface
  * Cvut\Fit\BiWt1\BlogBundle\Entity\CommentInterface
  * Cvut\Fit\BiWt1\BlogBundle\Service\BlogInterface
  * Cvut\Fit\BiWt1\BlogBundle\Service\UserInterface

## Hodnocení

Automatickým testem bude provedena kontrola dodržení výše uvedených rozhraní a validity HTML stránek a CSS. Hodnocení úlohy bude provedeno dle míry splnění funkčních požadavků. Celkový výsledek bude určen vztahem:  (počet splněných funkčních požadavků / celkový počet funkčních požadavků) * maximální počet bodů z úlohy 2.

Úloha bude hodnocena 0 body, pokud bude splněna libovolná z následujících podmínek:

  * Nesplnění nefunkčních požadavků.
  * Pokud řešení úlohy nevyhoví automatickým testům, úloha bude hodnocena 0 body.
  * Úloha je předložena k hodnocení po termínu uvedeném na EDUXu. Toto neplatí v odůvodněných případech (např. nemoc).
  * Z logu nástroje git není patrná průběžná práce (tj. log bude obsahovat minimum záznamů) bude hodnocena 0 body. Posouzení přísluší osobě vyučujícího!
  * Z logu nástroje git není možno jasně identifikovat osobu (osoby), která(é)  prováděla(y) většinu změn. Za vhodnou identifikaci považujeme jméno, příjmení a fakultní e-mailovou adresu.

Přístup do repozitáře musí být povolen pro *Deploy Key* (Settings -> Deploy Keys):

```
ssh-dss AAAAB3NzaC1kc3MAAACBANpZpTpv/SzJ2CDYPFj8HYZ+K6uKgLgkNEdU/V3H9r7CzWqwyNPei1bjPkpXr4Zow01PwbkjTtQ/jH2GyCwTURJkZBSPuePMGZqgZpfKsrqmrRVBnGmzRTrx6OccHFgvCV02U2yx06AfjEZfPqiJ8OvEFEdsNmVCKU2TmUaDWDexAAAAFQDsaOS9uZYJ5BYIqqwaxXTZUjqzewAAAIA8lNZ+uLdHUmfFdfOch7UXu6M/CC0YiKHX3+GuwYL1+BFBb0lATBNlw0rIk1Opq7O9TJ/fWqj+C5Z4GXPNTIISq2g5azPN+6JiQIl4j84gSrr/rZb1gcSrmKmJQdDBzo1aDecgIIM/qaoQLqMimbpman7A381CKXWva0HMxir3GgAAAIEA1+tRVR9MK454KrOPOm0ORRq8nddPuMh1nVe7sbyFnx88eM1Ovio+t/FSA23u91DP26VlHh3yEI2Zjd3g+TYf0F8hqTnLGjVTSnApturndJC5ZZ960Fu4NFs5tMcg8GMN0L9R/ojUAuoraZkPoISUr0JpdcVhZU7UrH9t7hrwqeE= kadleto2@webdev-fit-01
```

## Termín hodnocení

Automatické vyhodnocení bude spuštěno 8. 1. 2015 v 0.00, aby bylo možné na vypsaných jednorázových akcí výsledky zpracovat.

## Postup automatického vyhodnocení

  1. Z vašeho repozitáře (https://gitlab.fit.cvut.cz/LOGIN/blog-b141) bude staženo vaše řešení.
  1. Budou porovnány třídy testů ve vašem projektu a v zadání.
  1. Bude doplněn soubor composer.json o klíč pro GitHub, pokud jej nebude již obsahovat.
  1. Budou stažen nástroj composer a pomocí něj nainstalovány závislosti.
  1. Budou spuštěny testy.
  1. Bude zkontrolována validita vytvořených HTML a CSS.

Celý postup vyhodnocení bude zalogován, log bude k nahlédnutí.
