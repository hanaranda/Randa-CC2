<?php
  
namespace App\Imports;
  
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
  
class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name'     => $row['name'],
            'email'    => $row['description'], 
            'price' => $row['price'],
            'category' => $row['category'],
            'image' => $row['image'],
              
        ]);
    }
}