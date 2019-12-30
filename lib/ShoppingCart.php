<?php
    class Product{
        var $id;
        var $num;
    }
    class ShoppingCart{
        var $listProduct;
        public function __construct(){
            $this->listProduct=array();
        }
        public function update($id, $newNum){
            for($i=0;$i<count($this->listProduct); $i++)
            {
                if($this->listProduct[$i]->id==$id)
                {
                    $this->listProduct[$i]->num=$newNum;
                }
            }
                
        }
        public function delete($id){
            for($i=0;$i<count($this->listProduct); $i++){
                if($this->listProduct[$i]->id==$id)
                {
                    array_splice($this->listProduct,$i,1);
                }
            }
        }
        public function add($id){
            if(count($this->listProduct)==0){
                //chưa có sản phẩm trong giỏ hàng
                $p=new Product();
                $p->id=$id;
                $p->num=1;
                $this->listProduct[]=$p;
            }
            else
            {
                //Đã  có sản phẩm trong giỏ hàng rồi
                //Cần kiểm tra sản phẩm đó đã tồn tại trong giỏ hàng chưa
                //nếu đã có rồi thì chỉ cần cập nhật số lượng lên 1 
                //nếu chưa thì thêm mới sản phẩm vào giỏ hàng
                for($i=0;$i < count($this->listProduct);$i++)
                {
                    //hàm này để dừng tại sản phẩm đó trong listproduct
                    if($this->listProduct[$i]->id==$id)
                        break;
                }
                if($i==count($this->listProduct))
                {
                    //nếu đã duyệt hết mảng mà chưa có phần tử thì tạo mới
                    $p=new Product();
                    $p->id=$id;
                    $p->num=1;
                    $this->listProduct[]=$p;
                }
                else{//nếu có rồi thì cập nhật sl lên 1
                    $this->listProduct[$i]->num++;
                }
            }
        }
    }
?>