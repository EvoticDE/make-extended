# Laravel Make Extensions

The **Laravel Make Extensions** package provides additional `make:` commands that simplify common development tasks in Laravel, such as creating actions, DTOs (Data Transfer Objects), repositories, services, and more. This package aims to fill gaps in Laravel's built-in Artisan commands, offering enhanced tools to streamline development.

Developed to boost productivity and maintain code organization, these commands provide structure and separation of concerns for complex Laravel applications.

## Key Features

- **Enhanced `make:` commands**: Adds useful Artisan commands like `make:action`, `make:dto`, `make:repository`, and `make:service`.
- **Separation of concerns**: Promotes clean architecture patterns like CQRS and DDD (Domain-Driven Design) by offering DTOs, actions, and repositories.
- **Extendable**: Easily customizable stubs for generated files. See the [Customizing Stubs](#customizing-stubs) section for more information.
- **Seamless integration**: Works seamlessly with existing Laravel projects from version 9.x onwards.

## Installation

To install the **Laravel Make Extensions** package, follow these steps:

1. **Install via Composer**:

   Run the following command to install the package via Composer:

   ```bash
   composer require yourvendor/make-extensions
   ```

2. **Publish Configuration (Optional)**:

   If you want to customize any aspect of the package, you can publish the configuration files:

   ```bash
   php artisan vendor:publish --tag=make-extensions-config
   ```

## Usage

Once the package is installed, you can start using the new `make:` commands in your Laravel project.

For example, to create a new action class, simply run:

`php artisan make:action YourAction`

Each generated file will be placed in the appropriate folder, following Laravel’s naming conventions.

---

## Available Commands

This package provides the following `make:` commands:

### `make:action`

Creates a single-action class, which can be used to organize your business logic and simplify controllers. Typically used in a **CQRS** pattern.

#### Example:

`php artisan make:action ProcessOrderAction`

This generates the following file:

```php
// app/Actions/ProcessOrderAction.php

namespace App\Actions;

class ProcessOrderAction
{
    public function __invoke()
    {
        //
    }
}
```

#### Use Case:
Single-action classes can be useful for organizing logic that```s reused across different parts of your application (such as processing an order, user registration, etc.).

### `make:dto`

Generates a **Data Transfer Object** (DTO) class. DTOs are used to encapsulate data that is passed between layers of the application.

#### Example:

`php artisan make:dto UserDto`

This generates the following file:

```php
// app/DTOs/UserDto.php

namespace App\DTOs;

class UserDto
{
   public function __construct(
    //
   ) {}

    // Add your methods here
}
```

#### Use Case:
DTOs are used to carry data between different layers of the application (e.g., from a controller to a service) while ensuring that the data structure is consistent and immutable.

### `make:repository`

Creates a **Repository** class, useful for abstracting data access logic. Repositories are often used in service layers to handle database operations, ensuring that the domain logic is decoupled from the data source.

#### Example:

`php artisan make:repository UserRepository`

This generates the following file:

```php
// app/Repositories/UserRepository.php

namespace App\Repositories;

class UserRepository
{
    public function all()
    {
    // Fetch all users
    }

    public function find($id)
    {
        // Find a user by ID
    }

    public function create(array $data)
    {
        // Create a new user
    }

    public function update($id, array $data)
    {
        // Update an existing user
    }

    public function delete($id)
    {
        // Delete a user
    }
}
```

#### Use Case:
Repositories provide an abstraction layer between the business logic and the database, allowing developers to swap out the data source without affecting the rest of the application.

### `make:service`

Creates a **Service** class. Services contain the business logic of the application and typically call repositories or other services to perform their operations.

#### Example:

`php artisan make:service PaymentService`

This generates the following file:

```php
// app/Services/PaymentService.php

namespace App\Services;

class PaymentService
{
    public function __construct()
    {
        //
    }

    // Add your methods here
}
```

#### Use Case:
Service classes are useful for isolating business logic, making it easier to maintain, test, and reuse across different parts of the application.

---

## Customizing Stubs

If you need to customize the stubs generated by the `make:` commands, you can publish the stubs to your Laravel project by running:

```bash
php artisan vendor:publish --tag=make-extended-stubs
```

This will publish the stubs to the resources/stubs/make-extensions directory in your Laravel application. You can then modify these stubs as needed, and the package will use the customized stubs instead of the default ones.

### Example

To customize the `Service.stub`, you would find the file at: `resources/stubs/make-extended/Service.stub`.

---

## Contributing

If you'd like to contribute to this project, feel free to submit pull requests or open issues on GitHub. Contributions, suggestions, and improvements are always welcome!

## Important Links

- evotic Website: [evotic.io](https://evotic.io)
- Laravel Documentation: [Laravel Docs](https://laravel.com/docs)
- CQRS Pattern: [CQRS Documentation](https://martinfowler.com/bliki/CQRS.html)
- Data Transfer Objects (DTOs): [DTO Pattern](https://en.wikipedia.org/wiki/Data_transfer_object)

## License

This package is licensed under the MIT License. See the [LICENSE](LICENSE.md) file for more information.
