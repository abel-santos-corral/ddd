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
