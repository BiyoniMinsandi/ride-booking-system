# Code Citations

## License: unknown
https://github.com/LavaLite/cms/tree/6b281860c480035b54d0a33eb686cf9977b0f634/routes/web.php

```
[ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route
```


## License: unknown
https://github.com/douglas-moreno/dalfer/tree/0762dc9fef30c27c3d8dead132f58afc24722fcf/routes/web.php

```
');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::
```


## License: unknown
https://github.com/rhipler/laravel-todolist/tree/8962c0f5c3fcf6db9d49f68b6414d3a70ba2e738/routes/web.php

```
, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::
```


## License: unknown
https://github.com/cayetanogb/albunesFotografias/tree/53f81daa821d7a773f6e30f1d32df5bb3ad959e4/routes/web.php

```
;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function ()
```


## License: unknown
https://github.com/henryleeworld/laravel-weather-forecast/tree/1babb1b2d5269d37d0903a633622afa07897b646/routes/web.php

```
>name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'
```

