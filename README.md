
# Laravel Blog Api

Mobil uygulamalarınız için geliştirdiği blog servisi.
Kategori, Blog, Yorum, Kullanıcı işlemleri gibi birçok işlemi servis üzerinden yapabilir aynı zamanda servis API ile uygulamalarınız ile iletişime geçebilirsiniz.




## Yönetim Paneli
Laravel uygulaması standart kurulum adımlarından sonra /admin adresine yapacağınız işlem ile giriş yapabilir
uygulama içi çeşitli düzenlemelerde bulunabilirsiniz.

## API Kullanımı

#### Kullanıcı Kayıt

```http
  Post /api/register
```

| Parametre | Tip     | Açıklama                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Gerekli**. Kullanıcı adı. |
| `email` | `string` | **Gerekli**. Kullanıcı email. |
| `password` | `string` | **Gerekli**. Kullanıcı şifre. |
| `c_password` | `string` | **Gerekli**. Kullanıcı şifre tekrarı. |

Kayıt işlemi başarılı ise kullanıcı bilgilerini JSON formatında döndürür.

#### Kullanıcı Login

```http
  Post /api/login
```

| Parametre | Tip     | Açıklama                       |
| :-------- | :------- | :-------------------------------- |
| `email` | `string` | **Gerekli**. Kullanıcı email. |
| `password` | `string` | **Gerekli**. Kullanıcı şifre. |

Login işlemi sonrası diğer API isteklerinizde kullanılmak adına JWT token gönderilmektedir.


#### Token refresh

```http
  Get /api/refresh
```

```php
  $response = $client->request('GET', '/api/refresh', [
    'headers' => [
        'Authorization' => 'Bearer '.$token,
        'Accept' => 'application/json',
    ],
]);
```
Kullanım süresi sona eren JWT token refresh adresine göderilerek kullanıcının çıkış yapmasını
ve tekrar giriş yapmasına gerek kalmadan yenilemektedir.

#### Kullanıcı Bilgileri

```http
  get /api/refresh
```

```php
  $response = $client->request('GET', '/api/user', [
    'headers' => [
        'Authorization' => 'Bearer '.$token,
        'Accept' => 'application/json',
    ],
]);
```
Kullanıcı ile ilgileri bilgilerin alınması için /api/user adresine istek atılmalıdır.

  
## Kullanılan Teknolojiler

**İstemci:** Laravel, Bootstrap

**Sunucu:** PHP, Apache 2.4 MySql

  


[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)

[![GPLv3 License](https://img.shields.io/badge/License-GPL%20v3-yellow.svg)](https://opensource.org/licenses/)

[![AGPL License](https://img.shields.io/badge/license-AGPL-blue.svg)](http://www.gnu.org/licenses/agpl-3.0)

  