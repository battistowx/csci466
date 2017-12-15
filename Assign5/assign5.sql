-- This is the sql script for Assignment 5
-- Chris Battisto
-- Z1788103
-- 10/13/17
-- ---------------------------------------
-- First, open up database
USE classicmodels;
-- 1: Count number of tables in database
SELECT FOUND_ROWS();
-- 2: Get names of columns and domains for each table
SHOW columns FROM Customers;
SHOW columns FROM Employees;
SHOW columns FROM Offices;
SHOW columns FROM OrderDetails;
SHOW columns FROM Orders;
SHOW columns FROM Payments;
SHOW columns FROM Products;
-- 3a: Number of customers:
SELECT count(customerNumber) FROM Customers;
-- 3b: Number of orders:
SELECT count(customerNumber) from Orders;
-- 4a: Number of products:
SELECT count(productCode) FROM Products;
-- 4b: List all details for first 10 products:
SELECT productDescription from Products LIMIT 10;
-- 5:  Total payment amt for each customer who has made a payment, first 15:
SELECT amount FROM Payments LIMIT 15;
-- 6:  Alphabetically list cities where there are offices:
SELECT city FROM Offices ORDER BY city;
-- 7a:  Count number of employees:
SELECT count(employeeNumber) FROM Employees;
-- 7b:  Count employees in each office, list count and office code:
SELECT employeeNumber, officeCode FROM Employees;
-- 9a (8 was skipped in documentation):  Count orders:
SELECT count(orderNumber) FROM Orders;
-- 9b:  Count orders for each customer who has an order, only with 5+ orders
SELECT customerNumber FROM Orders GROUP BY customerNumber HAVING count(customerNumber) > 5;
-- 9c:  Count orders that have shipped:
SELECT count(shippedDate) FROM Orders;
-- 9d:  Order status can be "In process", "Shipped", "On Hold", or "Disputed"
-- 10:  List all employee names by Last, First name in reverse alphabetical order:
SELECT concat(lastName, ', ', firstName) FROM Employees ORDER BY lastName DESC;
-- 11:  List all employees who work in London:
SELECT employeeNumber FROM Employees WHERE officeCode=7;

 
  
