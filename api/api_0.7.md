# API version 0.7


Possible json in the GPG message :
```
{
    'pwd':<AES key>, //require
    'i':<AES iv>, //require
    'url':<url> //optionnal
    'v':<API version> //optionnal
    'a':<'v'|''>, //optionnal
}
```

## Parameters

### ```pwd```
[require]  
AES key for the reply  

### ```i```
[require]  
AES IV for the reply  

### ```url```
[optionnal]  
URL to check  

Return sha1 and sha256 of the certificat in a JSON in an AES message.  
```
{
    '0' : '<RANDOM_STRING>',
    '1' : '<SHA1>',
    '2' : '<SHA256>'
}
```

### ```v```
[optionnal]  
Specify which API's version you use.  

### ```a```
[optionnal]  
Action  
Possible value :  
- ```v``` : Return the API version of the server in a JSON in an AES message.  


## Example data

Public key :  
```
-----BEGIN PGP PUBLIC KEY BLOCK-----

mE8EXgJACRMFK4EEAAoCAwRdEdOrCeXlv7UFpPK/in9E5kCWW0m9xYSgyrr5xnSn
gEJ+yRtrjDv4SYp6I6wdkvyhcU2Vr10myY9ApKTgKabytBo8ZGVtb0BleGFtcGxl
LmVjaXJ0YW0ubmV0PoiWBBMTCAA+FiEEUllfRPVOzKQv/87b6unyT5VsZ10FAl4C
QAkCGwEFCSWYBgAFCwkIBwIGFQoJCAsCBBYCAwECHgECF4AACgkQ6unyT5VsZ12H
TwEA7C7xLyILO8qJhN4n8ozKSQufMzkov1Nb6fpOS6lW6HwBAKNJi9W36F+5V7h9
fACwkyq9mZK53zFeLSXACTMKDMbuuFMEXgJAHhIFK4EEAAoCAwRi467/xF/3+f57
Wk/NvFq+N3VVrSmEOVdGmCfsUG4ap2I9PXRZ3ckrgcGkDBHhwToLU53QiScYrL4S
yynmpCn8AwEIB4h+BBgTCAAmFiEEUllfRPVOzKQv/87b6unyT5VsZ10FAl4CQB4C
GwwFCQHhM4AACgkQ6unyT5VsZ13EbwEAveuR64yEUnR6mEG9IaG7yZzRZ56BGhKj
Xg52e72cspsBANyCtAsgvyrusVYDdtD4jswCRX2mE2Tp8M26kASl1PvR
=5snz
-----END PGP PUBLIC KEY BLOCK-----
```

Private key :  
```
-----BEGIN PGP PRIVATE KEY BLOCK-----

lHQEXgJACRMFK4EEAAoCAwRdEdOrCeXlv7UFpPK/in9E5kCWW0m9xYSgyrr5xnSn
gEJ+yRtrjDv4SYp6I6wdkvyhcU2Vr10myY9ApKTgKabyAAD+MsH03KA3zNAVoL65
RkYozeA2pJLDVqRsgluIWqwwwi0R4LQaPGRlbW9AZXhhbXBsZS5lY2lydGFtLm5l
dD6IlgQTEwgAPhYhBFJZX0T1TsykL//O2+rp8k+VbGddBQJeAkAJAhsBBQklmAYA
BQsJCAcCBhUKCQgLAgQWAgMBAh4BAheAAAoJEOrp8k+VbGddh08BAOwu8S8iCzvK
iYTeJ/KMykkLnzM5KL9TW+n6TkupVuh8AQCjSYvVt+hfuVe4fXwAsJMqvZmSud8x
Xi0lwAkzCgzG7px4BF4CQB4SBSuBBAAKAgMEYuOu/8Rf9/n+e1pPzbxavjd1Va0p
hDlXRpgn7FBuGqdiPT10Wd3JK4HBpAwR4cE6C1Od0IknGKy+Essp5qQp/AMBCAcA
AQCnotHWiXlucSsuYICvktMZQnp1KelswX45M1JtPz5YuQ7fiH4EGBMIACYWIQRS
WV9E9U7MpC//ztvq6fJPlWxnXQUCXgJAHgIbDAUJAeEzgAAKCRDq6fJPlWxnXcRv
AQC965HrjIRSdHqYQb0hobvJnNFnnoEaEqNeDnZ7vZyymwEA3IK0CyC/Ku6xVgN2
0PiOzAJFfaYTZOnwzbqQBKXU+9E=
=5XJJ
-----END PGP PRIVATE KEY BLOCK-----
```
  
  
JSON request :  
```
{"pwd":"mbK6CotI7DLWXA+dllk8MwT7\/XzlcND\/idnIs16LVkU=","i":"pcSbwlFCaee2opDWSqf0SQ==","url":"https:\/\/en.wikipedia.org\/","v":"0.7"}
```
  
GPG request :  
```
-----BEGIN PGP MESSAGE-----

hH4DQm+JxrvXr18SAgMELrxduYoDVtEZrOUEwxbixnr2Jq+SexgN76BfvUKELLKf
1sKKAm4fpKmoxj1FK8gh8GMyEYSO/jzzkrY6xv/WpjAWyB7pj4E3nhrWMToByp4n
vlbjAknS7HEWa+ZiMdxXCIFz7HriVYkYmnXMcUZkYVzSuwFnO4BsSSGK1ZRrquxK
xCaJ3iK810oH7ED2d7buTbjaDQQ8M97JuqBuRLVoAwlOoCQFNkThpdfQkqBaUlnE
13XmhK2GBJQPdxHNuZ3QFkw0DwAQYDq5VLNKC+pD316fty2p7dauXRKk8hgrUfoM
A3mcPBjp+AYvvS5f++grQf5AzdOuIvAB5UxNMcBxCt9tUuNgUcxm9z0c/+WUft0a
sDgJMFLYQQq4QZkvlEnwnF0e0NFA9Y3BY4MY+bs=
=XeBI
-----END PGP MESSAGE-----
```

Response :  
```
iG8cRKKVhKIFQnSw2BYGBux7Oupg33XEnIKkHreSwptOh6AJ7k2a6jE9Squ0zIx1ZnixGw2B7vYI/KzxF1OX86yHgMFjq8zdkzXiBrTeYInXQHZbkh+9oLzT39vyn70H+7S/2qjr6a5OkWUpVQco5pVTFq8SRR/HGYGRG0YUh0U8IPeIGFGZxqoyuBWXqTj29G/gdcgSfctx2qXFoKKE;aGPq2FVcGI39qtoev950eg==
```

JSON :  
```
["LyQdupyLyT2HfhpuLrBj21KmL347L0\/I4Ogp1rfW+xA=","397cb94a44a8ac31b6be83ac81c2f541e28715ad","fc923c9b811880bdb7949c37bb5ad922d31c50638f67278bf1c5d020f0ca8438"]
```

sha1 :  
```
397cb94a44a8ac31b6be83ac81c2f541e28715ad
```

sha256 :  
```
fc923c9b811880bdb7949c37bb5ad922d31c50638f67278bf1c5d020f0ca8438
```