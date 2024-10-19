CREATE TABLE SaaS_Products (
    product_id INT PRIMARY KEY,
    product_name VARCHAR(255),
    company_name VARCHAR(255)
);

CREATE TABLE Customers (
    customer_id INT PRIMARY KEY,
    customer_name VARCHAR(255),
    product_id INT,
    subscription_start_date DATE,
    subscription_end_date DATE,
    FOREIGN KEY (product_id) REFERENCES SaaS_Products(product_id)
);
