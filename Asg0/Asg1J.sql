SELECT ItemID, Description, Store, ROUND(LocalCurrencyAmount*ExchangeRate, 2) as USCurrencyAmount
FROM ITEM