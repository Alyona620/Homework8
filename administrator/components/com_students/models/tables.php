<?php

/**
 * @version     1.0.0
 * @package     com_students
 * @copyright   © 2013. Все права защищены.
 * @license     GNU General Public License версии 2 или более поздней; Смотрите LICENSE.txt
 * @author      Alyona <G_M_Alena@ukr.net> - http://
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Students records.
 */
class StudentsModeltables extends JModelList {

    /**
     * Constructor.
     *
     * @param    array    An optional associative array of configuration settings.
     * @see        JController
     * @since    1.6
     */
    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                                'id', 'a.id',
                'ordering', 'a.ordering',
                'state', 'a.state',
                'created_by', 'a.created_by',
                'pib', 'a.pib',
                'general_info', 'a.general_info',
                'birth_date', 'a.birth_date',
                'gender', 'a.gender',
                'group', 'a.group',
                'average_score', 'a.average_score',
                'number_student_book', 'a.number_student_book',
                'image', 'a.image',

            );
        }

        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     */
    protected function populateState($ordering = null, $direction = null) {
        // Initialise variables.
        $app = JFactory::getApplication('administrator');

        // Load the filter state.
        $search = $app->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        $published = $app->getUserStateFromRequest($this->context . '.filter.state', 'filter_published', '', 'string');
        $this->setState('filter.state', $published);

        
		//Filtering birth_date
		$this->setState('filter.birth_date.from', $app->getUserStateFromRequest($this->context.'.filter.birth_date.from', 'filter_from_birth_date', '', 'string'));
		$this->setState('filter.birth_date.to', $app->getUserStateFromRequest($this->context.'.filter.birth_date.to', 'filter_to_birth_date', '', 'string'));

		//Filtering gender
		$this->setState('filter.gender', $app->getUserStateFromRequest($this->context.'.filter.gender', 'filter_gender', '', 'string'));

		//Filtering group
		$this->setState('filter.group', $app->getUserStateFromRequest($this->context.'.filter.group', 'filter_group', '', 'string'));


        // Load the parameters.
        $params = JComponentHelper::getParams('com_students');
        $this->setState('params', $params);

        // List state information.
        parent::populateState('a.pib', 'asc');
    }

    /**
     * Method to get a store id based on model configuration state.
     *
     * This is necessary because the model is used by the component and
     * different modules that might need different sets of data or different
     * ordering requirements.
     *
     * @param	string		$id	A prefix for the store id.
     * @return	string		A store id.
     * @since	1.6
     */
    protected function getStoreId($id = '') {
        // Compile the store id.
        $id.= ':' . $this->getState('filter.search');
        $id.= ':' . $this->getState('filter.state');

        return parent::getStoreId($id);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return	JDatabaseQuery
     * @since	1.6
     */
    protected function getListQuery() {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Select the required fields from the table.
        $query->select(
                $this->getState(
                        'list.select', 'a.*'
                )
        );
        $query->from('`#__students_table` AS a');

        
    // Join over the users for the checked out user.
    $query->select('uc.name AS editor');
    $query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');
    
		// Join over the user field 'created_by'
		$query->select('created_by.name AS created_by');
		$query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');

        
    // Filter by published state
    $published = $this->getState('filter.state');
    if (is_numeric($published)) {
        $query->where('a.state = '.(int) $published);
    } else if ($published === '') {
        $query->where('(a.state IN (0, 1))');
    }
    

        // Filter by search in title
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where('a.id = ' . (int) substr($search, 3));
            } else {
                $search = $db->Quote('%' . $db->escape($search, true) . '%');
                $query->where('( a.pib LIKE '.$search.'  OR  a.birth_date LIKE '.$search.'  OR  a.gender LIKE '.$search.'  OR  a.average_score LIKE '.$search.'  OR  a.number_student_book LIKE '.$search.'  OR  a.image LIKE '.$search.' )');
            }
        }

        

		//Filtering birth_date
		$filter_birth_date_from = $this->state->get("filter.birth_date.from");
		if ($filter_birth_date_from) {
			$query->where("a.birth_date >= '".$db->escape($filter_birth_date_from)."'");
		}
		$filter_birth_date_to = $this->state->get("filter.birth_date.to");
		if ($filter_birth_date_to) {
			$query->where("a.birth_date <= '".$db->escape($filter_birth_date_to)."'");
		}

		//Filtering gender
		$filter_gender = $this->state->get("filter.gender");
		if ($filter_gender) {
			$query->where("a.gender = '".$db->escape($filter_gender)."'");
		}

		//Filtering group
		$filter_group = $this->state->get("filter.group");
		if ($filter_group) {
			$query->where("a.group = '".$db->escape($filter_group)."'");
		}


        // Add the list ordering clause.
        $orderCol = $this->state->get('list.ordering');
        $orderDirn = $this->state->get('list.direction');
        if ($orderCol && $orderDirn) {
            $query->order($db->escape($orderCol . ' ' . $orderDirn));
        }

        return $query;
    }

    public function getItems() {
        $items = parent::getItems();
        
        return $items;
    }

}
