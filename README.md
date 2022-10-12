


## Yönetim Paneli
Laravel uygulaması standart kurulum adımlarından sonra /admin adresine yapacağınız işlem ile giriş yapabilir
uygulama içi çeşitli düzenlemelerde bulunabilirsiniz.
Uygulama içerisinde api ile ilk kayıt sonrasında users tablosunda role sütuna admin kullanıcısı için role admin değeri ataması yapınız.
Sonrasında admin panele erişim imkanı sağlayacaksınız.

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
  Get /api/user
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

#### Paylaşılan Blog Yazıları

```http
  Get /api/posts
```

```php
  $response = $client->request('GET', '/api/posts', [
    'headers' => [
        'Authorization' => 'Bearer '.$token,
        'Accept' => 'application/json',
    ],
]);

Response Preview

{
	"data": [
		{
			"id": 1,
			"title": "test",
			"content": "<p>test<\/p>",
			"category": "Test Kategori",
			"category_id": 1,
			"image": "http:\/\/laravelnews.test\/uploads\/1665493945.jpeg",
			"created_at": null
		}
	],
	"message": "success"
}
```
#### Paylaşılan Blog Detay

```http
  Get /api/post{id}
```

```php
  $response = $client->request('GET', '/api/posts/{id}', [
    'headers' => [
        'Authorization' => 'Bearer '.$token,
        'Accept' => 'application/json',
    ],
]);

Response Preview

{
	"data": {
		"id": 1,
		"title": "test",
		"content": "<p>test<\/p>",
		"category": "Test Kategori",
		"category_id": 1,
		"image": "http:\/\/laravelnews.test\/uploads\/1665493945.jpeg",
		"created_at": null
	},
	"message": "success"
}
```

#### Kategoriler

```http
  Get /api/categories
```

```php
  $response = $client->request('GET', '/api/categories', [
    'headers' => [
        'Authorization' => 'Bearer '.$token,
        'Accept' => 'application/json',
    ],
]);

Response Preview
{
	"data": [
		{
			"id": 1,
			"category_name": "Test Kategori",
			"category_image": "http:\/\/laravelnews.test\/uploads\/1665493930.jpeg"
		}
	],
	"message": "success"
}
```

#### Kategori Detay

```http
  Get /api/categories/{id}
```

```php
  $response = $client->request('GET', '/api/categories/{id}', [
    'headers' => [
        'Authorization' => 'Bearer '.$token,
        'Accept' => 'application/json',
    ],
]);

Response Preview
{
	"data": [
		{
			"id": 1,
			"title": "test",
			"content": "<p>test<\/p>",
			"category": "Test Kategori",
			"category_id": 1,
			"image": "http:\/\/laravelnews.test\/uploads\/1665493945.jpeg",
			"created_at": null
		}
	],
	"message": "success"
}
```

