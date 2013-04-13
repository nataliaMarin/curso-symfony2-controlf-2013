<?php

namespace Lexik\Bundle\FormFilterBundle\Filter\ORM\Filters;

use Doctrine\ORM\QueryBuilder;

use Lexik\Bundle\FormFilterBundle\Filter\ORM\Expr;
use Lexik\Bundle\FormFilterBundle\Filter\ORM\ORMFilter;

/**
 * Filter type for numbers.
 *
 * @author Cédric Girard <c.girard@lexik.fr>
 */
class NumberFilter extends ORMFilter
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'filter_number';
    }

    /**
     * {@inheritdoc}
     */
    protected function apply(QueryBuilder $filterBuilder, Expr $expr, $field, array $values)
    {
        if ('' !== $values['value'] && null !== $values['value']) {
            $op = $values['condition_operator'];
            $filterBuilder->andWhere($expr->$op($field, $values['value']));
        }
    }
}
