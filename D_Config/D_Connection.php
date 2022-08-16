<?php



class DB
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "asset_manager";

    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=UTF8";

        try {
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

            $con =  new PDO($dsn, $this->user, $this->password, $options);
            $this->db = $con;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function connection()
    {
        return $this->db;
    } 

    public function update($table, $data, $conditions)
    {
        if (!empty($data) && is_array($data)) {
            $colvalSet = '';
            $whereSql = '';
            $i = 0;

            if (!array_key_exists('modified', $data)) {
                $data['modified'] = date("Y-m-d H:i:s");
            }
            foreach ($data as $key => $val) {
                $pre = ($i > 0) ? ', ' : '';
                $colvalSet .= $pre . $key . "='" . $val . "'";
                $i++;
            }
            if (!empty($conditions) && is_array($conditions)) {
                $whereSql .= ' WHERE ';
                $i = 0;
                foreach ($conditions as $key => $value) {
                    $pre = ($i > 0) ? ' AND ' : '';
                    $whereSql .= $pre . $key . " = '" . $value . "'";
                    $i++;
                }
            }
            $sql = "UPDATE " . $table . " SET " . $colvalSet . $whereSql;
            $query = $this->db->prepare($sql);
            $update = $query->execute();
            return $update ? $query->rowCount() : false;
        } else {
            return false;
        }
    }

    public function insert($table, $data)
    {
        // $pdo = require "connection.php";
        if (!empty($data) && is_array($data)) {

            if (!array_key_exists('created', $data)) {
                $data['created'] = date("Y-m-d H:i:s");
            }
            if (!array_key_exists('modified', $data)) {
                $data['modified'] = date("Y-m-d H:i:s");
            }

            $columnString = implode(',', array_keys($data));
            $valueString = ":" . implode(',:', array_keys($data));
            // echo $columnString;
            // echo $valueString;
            $sql = "INSERT INTO " . $table . "(" . $columnString . ") VALUES (" . $valueString . ")";
            $statement = $this->db->prepare($sql);

            foreach ($data as $key => $value) {
                $statement->bindValue(":" . $key, $value);
            }
            $inserted = $statement->execute();
            return $inserted ? $this->db->lastInsertId() : false;
        } else {
            return false;
        }
    }
    public function getRows($table, $conditions = array())
    {
        $sql = 'SELECT ';
        $sql .= array_key_exists("select", $conditions) ? $conditions['select'] : '*';
        $sql .= ' FROM ' . $table;
        if (array_key_exists("where", $conditions)) {
            $sql .= ' WHERE ';
            $i = 0;
            foreach ($conditions['where'] as $key => $value) {
                $pre = ($i > 0) ? ' AND ' : '';
                $sql .= $pre . $key . " = '" . $value . "'";
                $i++;
            }
        }

        if (array_key_exists("order_by", $conditions)) {
            $sql .= ' ORDER BY ' . $conditions['order_by'];
        }

        // if (array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)) {
        //     $sql .= ' LIMIT ' . $conditions['start'] . ',' . $conditions['limit'];
        // } elseif (!array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)) {
        //     $sql .= ' LIMIT ' . $conditions['limit'];
        // }

        $query = $this->db->prepare($sql);
        $query->execute();

        if (array_key_exists("return_type", $conditions) && $conditions['return_type'] != 'all') {
            switch ($conditions['return_type']) {
                case 'count':
                    $data = $query->rowCount();
                    break;
                case 'single':
                    $data = $query->fetch(PDO::FETCH_ASSOC);
                    break;
                default:
                    $data = '';
            }
        } else {
            if ($query->rowCount() > 0) {
                $data = $query->fetchAll();
            }
        }
        return !empty($data) ? $data : false;
    }

    public function delete($table, $conditions)
    {
        $whereSql = '';
        if (!empty($conditions) && is_array($conditions)) {
            $whereSql .= ' WHERE ';
            $i = 0;
            foreach ($conditions as $key => $value) {
                $pre = ($i > 0) ? ' AND ' : '';
                $whereSql .= $pre . $key . " = '" . $value . "'";
                $i++;
            }
        }
        $sql = "DELETE FROM " . $table . $whereSql;
        $delete = $this->db->exec($sql);
        return $delete ? $delete : false;
    }

    //Encrypt - Decrypt Code
    public function encryptor($action, $string) {
        // pls set your unique hashing key
        // $secret_key = 'muni';
        // $secret_iv = 'muni123';
        $secret_key = 'AA934MM673II982MM456AA427NN239II983YY450AA014SS8';
        $secret_iv = 'MM834AA456NN825II935YY510AA835MM';
     
        $output = false;
        $encrypt_method = "AES-256-CBC";
        // hash
        $key = hash('sha256', $secret_key);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
     
        //do the encyption given text/string/number
        if( $action == 'e' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'd' ){
            //decrypt the given text/string/number
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
     
        return $output;
    }
    //enc-dec code ends 
    
}
