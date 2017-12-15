-- This is the sql script for Assignment 6
-- Chris Battisto
-- Z1788103
-- 10/20/17
-- ---------------------------------------
-- First, open up database
USE classicmodels;
-- 1: How many employees work in each city
SELECT city, count(employeeNumber) FROM Employees, Offices GROUP BY city;
-- 2: List employee first/last name and number of customers for each employee
SELECT concat(lastName, ', ', firstName), count(Customers.salesRepEmployeeNumber) AS custAmt FROM Employees LEFT JOIN Customers ON Employees.employeeNumber=Customers.salesRepEmployeeNumber GROUP BY lastName;
-- 3:  Employee first/last name and first/last name of person they report to
SELECT concat(contactlastName, ', ', contactfirstName), concat(lastName, ', ', firstName) AS Reports_To FROM Customers LEFT JOIN Employees ON Employees.employeeNumber=Customers.salesrepemployeeNumber GROUP BY lastName;
-- 4:  List contact/payment amount for first 25 customers
SELECT concat(contactLastName, ', ', contactFirstName), count(Payments.customerNumber) AS Payment_Amount FROM Customers LEFT JOIN Payments ON Payments.customerNumber=Customers.customerNumber GROUP BY contactLastName LIMIT 25;
-- 5:  Amount of customers who live in same city as their sales rep
SELECT count(customerNumber) AS CustAmount FROM Customers INNER JOIN Employees ON Customers.salesrepemployeeNumber=Employees.employeeNumber WHERE Customers.city=Employees.officeCode;
-- 6:  Amount of customers in same city as sales rep with their name
SELECT concat(contactLastName, ', ', contactFirstName), count(customerNumber) AS CustAmount FROM Customers, Employees LEFT JOIN Offices ON Offices.officeCode=Employees.officeCode;
-- 7:  List customer who ordered most expensive product
SELECT customerName FROM Customers, OrderDetails LEFT JOIN Products ON Products.productCode=OrderDetails.productCode ORDER BY buyPrice LIMIT 1;
-- 8:  List customer who made largest payment
SELECT concat(contactfirstname, contactlastname) FROM Customers INNER JOIN Payments ON Payments.customerNumber=Customers.customerNumber ORDER BY amount LIMIT 1;
-- 9:  List all product descriptions for products from Min Lin and Exoto two different ways
SELECT productVendor, productDescription FROM Products WHERE productVendor LIKE "Exoto Designs" OR productVendor LIKE "Min Lin Diecast";
SELECT productVendor, productDescription FROM Products WHERE productVendor="Min Lin Diecast" OR productVendor="Exoto Designs";



 
  
