# Web Backend Developer Assignment

## Build Wtih

-   Laravel Framework
-   GraphQL (nuwave/lighthouse)
-   Laravel Passport (Authentication)
-   Maatwebsite/Laravel-Excel (Import && Export Excel)
-   Faker (Data Seeding)

## Project Setup

### 1. Git Clone Web Backend Developer Assignment Project

```
git clone git@github.com:myozin-kyaw/web_backend_developer_assignment.git
```

### 2. Preparing the project fake data, environment setup & depenencies

#### On Linux or Mac Os

```
./refresh.sh
```

#### On Window

```
    rm -rf database/database.sqlite ( Only run to remove the database/database.sqlite when you want the project to restart. )
    php artisan migrate:refresh --seed
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan passport:client --personal
```

### 3. Go to the GraphQL URL

#### If you're using Herd, then link the project, then go to the below link

```
    http://web_backend_assignment.test/graphiql
```

#### Otherwise, serve the project using localhost on your machine

```
    http://127.0.0.1:8000/graphiql
```

### 4. Then, Login

```
    mutation {
        login(input: {
            username: "admin",
            password: "password"
        })
    }
```

### 5. Get Authenticated User

```
    {
        me {
            username,
            email,
        }
    }
```

### 6. Employee Pagination List

```
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

### 7. Employee Detail By ID

```
    {
        employee(id: 1) {
            id,
            first_name,
            last_name,
            salary
        }
    }
```

### 8. Create Employee Payload

```
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

### 9. Update Employee Payload

```
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

### 10. Delete Employee

```
    mutation {
        deleteEmployee(id: $id) {
            id
        }
    }
```

### 11. Export Employees Excel

```
    mutation {
        exportEmployeesExcel
    }
```

### 12. Import Employees Excel

> [Download Sample Employee Excel Import File](https://github.com/myozin-kyaw/web_backend_developer_assignment/tree/main/public/assets/employees-excel.xlsx)

-   In your postman application of form-data

> Employee Excel Import Endpoint

```
    endpoint: http://web_backend_assignment.test/graphql (or) http://127.0.0.1/graphql
    method: POST
```

> Payload

```
    operations : { "query": "mutation ($file: Upload!) { importEmployeesExcel(file: $file) }", "variables": { "file": null } }

    0 : $file

    map : { "0": ["variables.file"] }
```
