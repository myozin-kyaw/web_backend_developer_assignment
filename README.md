# Web Backend Developer Assignment

### Build Wtih

-   Laravel Framework
-   GraphQL (nuwave/lighthouse)
-   Laravel Passport (Authentication)
-   Maatwebsite/Laravel-Excel (Import && Export Excel)
-   Faker (Data Seeding)

### Project Setup

1. Git Clone Web Backend Developer Assignment Project

```
git clone git@github.com:myozin-kyaw/web_backend_developer_assignment.git
```

2. Composer install

```
composer install
```

3. Composer install

```
cp .env.example .env
```

3. Generate Environment Key

```
php artisan key:generate
```

4. Generate Personal OAuth Token

```
    php artisan passport:client --personal
```

4. Go to the route

```
    http://web_backend_assignment.test/graphiql
```

5. Then, Login

```json
    mutation {
        login(input: {
            username: "admin",
            password: "password"
        })
    }
```

6. Get Authenticated User

```json
    {
        me {
            username,
            email,
        }
    }
```

7. Employee Pagination List

```json
    {
        employees(first: 25) {
            data {
                id,
                first_name,
                last_name
            }
        }
    }
```

8. Employee Detail By ID

```json
    {
        employee(id: 1) {
            id,
            first_name,
            last_name,
            salary
        }
    }
```

9. Create Employee Payload

```json
    mutation {
        createEmployee(input: {
            first_name: "Mg",
            last_name: "Mg",
            email: "mgmg@gmail.com",
            phone: "09787878787",
            address: "Yangon",
            salary: 1300000,
        }) {
            id,
            first_name,
            last_name,
            salary
        }
    }
```

10. Update Employee Payload

```json
    mutation {
        updateEmployee(id: $id, input: {
            first_name: "Mg",
            last_name: "Mg",
            email: "mgmg@gmail.com",
            phone: "09787878787",
            address: "Mandalay",
            salary: 1500000
        }) {
            id,
            first_name,
            last_name,
        }
    }
```

11. Delete Employee

```json
    mutation {
        deleteEmployee(id: $id) {
            id
        }
    }
```
