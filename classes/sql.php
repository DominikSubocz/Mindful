<?php

class SQL {
  public static $getAllBooks = "SELECT * FROM books";

  /**
   * Get the book with the id given in the URL parameter.
   * 
   * The ? indicates a placeholder value which we will supply 
   * when executing the statement.
   */
  public static $getBook = "SELECT * FROM books WHERE book_id = ?";

  public static $getUser = "SELECT user_id, username, password, user_role FROM mindful.users WHERE username = ?";

  public static $createUser = "INSERT INTO users (username, email, password) VALUES (?,?,?)";

  public static $createBook = "INSERT INTO books (title, author, price, filename) VALUES (?,?,?,?)";

  public static $updateBook = "UPDATE books
        SET title = ?, author = ?, price = ?, filename = ?
        WHERE book_id = ?";
  public static $updateBookNoFile = "UPDATE books
        SET title = ?, author = ?,  price = ?
        WHERE book_id = ?";

  public static $deleteBook = "DELETE FROM books WHERE book_id = ?";
  public static $createOrder = "INSERT INTO orders
      (order_id, book_id, user_id, quantity, order_date, address_line, postcode) VALUES
      (?,?,?,?,?,?,?)";
  public static $getMaxOrderID = "SELECT MAX(order_id) FROM orders";
  public static $getPostcode = "SELECT * FROM postcodes WHERE postcode = ?";
  public static $createPostcode = "INSERT INTO postcodes (postcode, town, county) VALUES (?,?,?)";
  public static $getUserOrders = "SELECT * FROM orders INNER JOIN books
      ON orders.book_id = books.book_id
      WHERE user_id = ?
      ORDER BY orders.order_date DESC";

  public static $getTotalOrderPrice = "SELECT SUM(orders.quantity * books.price)
      FROM orders
      INNER JOIN books
      ON orders.book_id = books.book_id
      WHERE orders.user_id = ? AND orders.order_id = ?";

    public static $getArticleSearchResult = "SELECT * FROM mindful.books WHERE title LIKE ?";


   public static $searchArticleAsc = "SELECT * FROM mindful.books WHERE title LIKE ? ORDER BY title ASC";

   public static $searchArticleDesc = "SELECT * FROM mindful.books WHERE title LIKE ? ORDER BY title DESC";



}