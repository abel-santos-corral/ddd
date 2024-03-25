<?php
namespace Drupal\ddd_news\Plugin\views\filter;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\filter\FilterPluginBase;

/**
 * Relative date filter.
 *
 * @ingroup views_filter_handlers
 *
 * @ViewsFilter("ddd_relative_date_filter")
 */
class RelativeDateViewsFilter extends FilterPluginBase {

  /**
   * Form with all possible filter values.
   */
  protected function valueForm(&$form, FormStateInterface $form_state) {
    $form['value'] = [
      '#tree' => TRUE,
      'relative_date' => [
        '#type' => 'select',
        '#title' => $this->t('Subscribed'),
        '#options' => [
          'all' => $this->t('All'),
          'last_week' => $this->t('Last Week'),
          'last_month' => $this->t('Last Month'),
        ],
        '#default_value' => !empty($this->value['relative_date']) ? $this->value['relative_date'] : 'all',
      ]
    ];
  }

  /**
   * Adds conditions to the query based on the selected filter option.
   */
  public function query() {
    $this->ensureMyTable();
    $date = "$this->tableAlias.$this->realField";
    switch ($this->value['relative_date']) {
      case 'last_week':
        $last_week_time = strtotime("first day of previous week");
        $this_week_time = strtotime("first day of this week");
        $last_week = "FROM_UNIXTIME(" . $last_week_time . ")";
        $this_week = "FROM_UNIXTIME(" . $this_week_time . ")";
        $this->query->addWhereExpression($this->options['group'], "$date >= $last_week AND $date < $this_week");
        break;
      case 'last_month':
        $last_month = strtotime("first day of previous month");
        $this_month = strtotime("first day of this month");
        $this->query->addWhereExpression($this->options['group'], "$date >= $last_month AND $date < $this_month");
        break;
    }
  }

  public function adminSummary() {
    if ($this->isAGroup()) {
      return $this->t('grouped');
    }
    if (!empty($this->options['exposed'])) {
      return $this->t('exposed') . ', ' . $this->t('default state') . ': ' . $this->value['relative_date'];
    }
    else {
//      return $this->t('relative_date') . ': ' . $this->value['relative_date'];
    }
  }

}
