<?php
class Groups_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_last_ten_entries()
    {
        //
    }

    public function insert_entry()
    {
        //
    }

    public function update_entry()
    {
      //
    }

   
    public function getDatatablesList($limit = null, $offset = 0)
    {
        // Col names by alias, used to order by colName, not alias, because
        // doesn't work when this is a datetime column
        $orderable = [];

        $query = $this->db
            ->select('SQL_CALC_FOUND_ROWS id, 
                        id, 
                        name, 
                        created_at as treated_datetime,'
                , false)                   
            ->from('groups');

        //Ao filtrar por "todos" no datatables, ele envia -1
        if ( $limit > 0 ) {
            $query
                ->limit($limit)
                ->offset($offset);
        }

        $this->datatablesQuery($query, [], $orderable);
        $result = $query->get()->result();
        $foundRows = $this->db->select('FOUND_ROWS() as found_rows')->get()->result_array()[0]['found_rows'];

        return ['foundRows' => $foundRows, 'data' => $result];
    }

}