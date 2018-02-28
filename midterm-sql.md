SELECT customer_reviews.headline, customer_reviews.review, books.title, author.last_name, publishers.publisher_name
FROM books
WHERE authors.id = books.author_id
WHERE customer_reviews.book_id = books.book_id
WHERE publishers.id = books.publisher_id;
