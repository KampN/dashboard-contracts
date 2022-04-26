# dashboard-contracts

## Installation

Add this to your composer.json

	"repositories": [
		{
			"type": "vcs",
			"url": "git@github.com:KampN/dashboard-contracts.git"
		}
	]
	

Execute composer command 
- `composer require kampn/dashboard-contracts:dev-main`
 

Exemple de filtres :
```json
[
	{"operand":  "shop_id", "operator":  "=","values": ["S205"]	},
	{"operand":  "cost", "operator":  ">","values": [0]	},
	{"operand":  "label", "operator":  "=","values": ["kampn-monitoring"]}
]
```
Token de filtre correspondant : 
> JSON encode > base 64 > Url encode
```text
W3sib3BlcmFuZCI6InNob3BfaWQiLCJvcGVyYXRvciI6Ij0iLCJ2YWx1ZXMiOlsiUzIwNSJdfSx7Im9wZXJhbmQiOiJjb3N0Iiwib3BlcmF0b3IiOiI%2BIiwidmFsdWVzIjpbMF19LHsib3BlcmFuZCI6ImxhYmVsIiwib3BlcmF0b3IiOiI9IiwidmFsdWVzIjpbImthbXBuLW1vbml0b3JpbmciXX1d
```

Exemple de requete http : 
```
https://foobar.kampn.com/api/foo/query?resource=mr_bricolage&segments[]=shop_id&segments[]=operation_name&start_date=2022-03-01T00:00:00+00:00&end_start=2022-04-26T23:59:59+00:00filters=W3sib3BlcmFu...vbml0b3JpbmciXX1d
```
