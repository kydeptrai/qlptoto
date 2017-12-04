<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart)
    {
		if($oldCart)
		{
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}
    public function add($item, $id, $number)
    {
        $storeditem = ['qty' => 0, 'price' => $item->dongia, 'item' => $item];
//        $this->totalPrice = $item->dongia;
        if($this->items)
        {
            if(array_key_exists($id, $this->items))
            {
                $storeditem = $this->items[$id];
            }
        }
        $storeditem['qty']+=$number;
        $storeditem['price'] = $item->dongia * $storeditem['qty'];
        $this->items[$id] = $storeditem;
        $this->totalQty++;
        $this->totalPrice +=$item->dongia * $storeditem['qty'];
    }
    public function reduceByOne($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if($this->items[$id]['qty']<=0){
            unset($this->items[$id]);
        }
    }

    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
