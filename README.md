# Para crear migration, model,controller, factory

```bash
sail artisan make:model --migration --controller --factory Post
sail artisan make:model Follower -mc
```

## Correr una factory

```bash
composer dump-autoload
sail artisan tinker
Post::factory()->count(20)->create();
```

# Policies

```bash
sail artisan make:policy PostPolicy --model=Post
```

# rollback

```bash
sail artisan migrate:rollback --step=1
```

# creando una migracion a una tabla ya existente

```bash
sail artisan make:migration add_image_field_to_users_table
```

# Creando un componente

```bash
sail artisan make:component ListarPost
```

# Livewire

```bash
sail composer require livewire/livewire || composer require livewire/livewire
```

```bash
sail artisan make:livewire like-post
```
