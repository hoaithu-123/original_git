<?php
// 51, 137 err nen comment
	class Model{
		//biến lưu trữ các dữ liệu data
		private $connect;
		private $tableName;
		public function __construct(){
			$data = [
			"host" 		=> "localhost",
			"username"  => "root",
			"password"  => "",
			"dbname"    => "qlsinhvien",
			"port"      => 3306
			];

			//Tạo kết nối đến MySQL - máy chủ tạo Data
			$this->connect = new mysqli(
				$data['host'],
				$data['username'],
				$data['password'],
				$data['dbname'],
				$data['port']

			);
			$this->connect->set_charset("utf8");
			//Check kết nối
			if($this->connect->connect_errno){
				die("Failed to connet to Msql (" .$this->connect->connect_errno .")" .$this->connect->connect_error);
			}
			
		}
		public function setTable($tableName){
			$this->tableName = $tableName;
		}


		//data=[
		// 	'columns' => 'values'
			
		// ]
		public function insert($data){
			$lstCloumn = [];
			$lstValue = [];
			foreach ($data as $key => $value) {
				$lstCloumn[] = $key;
				$lstValue[] = $value;
			}
			$sql = "INSERT INTO ". $this->tableName . " (" . implode(",", $lstCloumn). ") VALUES ('" . implode("','",
				 $lstValue). "')";
			echo $sql; die();
			if($this->connect->query($sql) == true){
				// return $this->connect->insert_id();

			}else{
				return false;
			}
		}
		
		// data = [
		// 	"column" => "value"
		// ]
		public function update($data, $condition){
			$lstUpdate = [];
			foreach ($data as $key => $value) {
				$lstUpdate[] = $key . " = " . "'" .$value . "'";
			}
			$sql = "UPDATE ". $this->tableName . " SET " . implode(",", $lstUpdate) . " WHERE " .$condition;
			echo "ok";
			if($this->connect->query($sql) == true){
				return true;

			}else{
				return false;
			}
		}

		public function delete($condition){
			$sql = "DELETE FROM ". $this->tableName .  " WHERE " . $condition;
			if($this->connect->query($sql) == true){
				return true;

			}else{
				return false;
			}
		}

		// $input = [
		// 	"column" => "",
		// 	"condition" => ""
		// ]
		public function selectOne($input)
		{
			$sql ="SELECT ". $input['column']. " FROM ". $this->tableName;

			if(isset($input['condition'])){
				$sql .=  " WHERE " . $input['condition'];

			}
			if(isset($input['order'])){
				$sql .= " ORDER BY " . $input['order'];
			}
			if(isset($input['group'])){
				$sql .= " GROUP BY " . $input['group'];
			}
			if(isset($input['having'])){
				$sql .= " HAVING " . $input['having'];
			}

			$result = $this->connect->query($sql);
			if(($result->num_rows) >0){
				return $result->fetch_assoc();

			}else{
				return false;
			}

		}

		public function selectMulti($input)
		{
			$sql ="SELECT ". $input['column']. " FROM ". $this->tableName;

			if(isset($input['condition'])){
				$sql .= " WHERE " . $input['condition'];
			}
			if(isset($input['order'])){
				$sql .= " ORDER BY " . $input['order'];
			}
			if(isset($input['group'])){
				$sql .= " GROUP BY " . $input['group'];
			}
			if(isset($input['having'])){
				$sql .= " HAVING " . $input['having'];
			}
			//SQL chống tấn công Ịnjection
			//1.chuyển đổi OBject MySql -> OBject Stmt, đồng thời chuẩn bị Query
			$stmt = $this->connect->prepare($sql);
			// $stmt->excute();//thực hiện Query
			$result = $stmt->get_result();//lấy kq Query trả về


			// $result = $this->connect->query($sql);//thực hiện truy vấn MySql
			$lstData = [];
			if(($result->num_rows) >0){
				while($row = $result->fetch_assoc()){
					$lstData[] = $row;
				}

			}
			return $lstData;

		}

		//Query những trường hợp khó
		public function query($sql){
			return $this->connect->query($sql);
		}



	}

?>