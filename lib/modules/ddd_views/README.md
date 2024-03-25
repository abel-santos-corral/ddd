# DDD Views

Module aimed to test views examples from Drupalize.me or other sites.

## Custom Views Sort Plugin

This is coming from link [Define a Custom Views Sort Plugin](https://drupalize.me/tutorial/define-custom-views-sort-plugin)

### Config

This is configured in view Test content. The sort is done by sort plugin called Natural title sort.

### Code

The code is found in src > Plugin > views > sort. Class TitleSort.php.

### Test it

Create several nodes of type Test views. Use prefixes: 'a', 'an', 'the' in the the title.

The sorting will discard those words when sorting.

## Custom Views Pseudo Field Plugin

This is coming from link [Define a Custom Views Pseudo Field Plugin](https://drupalize.me/tutorial/define-custom-views-pseudo-field-plugin)

### Config

This is configured in view Test content. The added is the full time calculated from two fields of the view.

### Code

The code is found in src > Plugin > views > field. Class FullTime.php.

### Test it

Create two nodes of type Test views. Add preparation and cook time (in minutes)

When going to the view, the field will be shown calculated.

## Expose a Custom Database Table to Views

This is coming from link [Expose a Custom Database Table to Views](https://drupalize.me/tutorial/expose-custom-database-table-views)

### Config

Enable module ddd_news.

This is configured in view _DDD - News - News subscriptions_. Check phpmyadmin to see the table and fields.

### Code

The code is found in module ddd_news.

### Test it

Add several records at the table to populate it. Use template:

```
INSERT INTO news_subs (first_name, last_name, email, created, is_active) VALUES ('John', 'Doe', 'john.doe@example.com', UNIX_TIMESTAMP(), 1);
INSERT INTO news_subs (first_name, last_name, email, created, is_active) VALUES ('Jane', 'Doe', 'jane.doe@example.com', UNIX_TIMESTAMP(), 1);
INSERT INTO ddd_news_subs (first_name, last_name, email, created, is_active) VALUES ('Justa', 'Fish', 'jfish@example.com', UNIX_TIMESTAMP(), 0);

```

When going to the view, the data of news subscribers will be shown.
