@extends('layouts.master_backend')
@section('contant')

<div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-md-12">
                              <div class="card mb-9">
                                <h5 class="card-header">Edit product</h5>
                                <div class="card-body">
                                <form action="{{ url('admin/product/update/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                              <div>
                                    <label for="defaultFormControlInput" class="form-label">Name</label>
                                    <input
                                      type="text"
                                      name="name"
                                      value="{{$pro->name}}"
                                      class="form-control"
                                      id="defaultFormControlInput"
                                      placeholder="กรุณากรอกชื่อสินค้า"
                                      aria-describedby="defaultFormControlHelp"
                                    />

                                    
                                    <label for="defaultFormControlInput" class="form-label">Price</label>
                                    <input
                                      type="text"
                                      name="price"
                                      value="{{$pro->price}}"
                                      class="form-control"
                                      id="defaultFormControlInput"
                                      placeholder="กรุณากรอกราคาสินค้า"
                                      aria-describedby="defaultFormControlHelp"
                                    />

                                    <label for="defaultFormControlInput" class="form-label">Description</label>
                                    <input
                                      type="text"
                                      name="description"
                                      value="{{$pro->description}}"
                                      class="form-control"
                                      id="defaultFormControlInput"
                                      placeholder="กรุณากรอกรายละเอียดสินค้า"
                                      aria-describedby="defaultFormControlHelp"
                                    />

                                    <label for="exampleFormControlSelect1" class="form-label">Category</label>
                                    <select name="category_id" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                      
                                      @foreach ($cat as $c)
                                      <option value="{{$c->category_id }}"
                                      @if ($c->category_id == $pro->category_id)
                                       selected
                                       @endif>
                                       {{ $c->name}}</option>
                                      @endforeach
                                    </select>


                                    <label for="defaultFormControlInput" class="form-label">Images</label>
                                      <div class="input-group">
                                        <input name="image" type="file" class="form-control" id="inputGroupFile02" />
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                      </div>
                                      <div class="mt-4">
                                        <img src="{{asset('backend/product1/resize/'.$pro->image)}}" alt="">
                                      </div>

                                    <input type="submit" value= "อัพเดท" class="btn btn-primary mt-3">
                                    <a href="{{route('u.product')}}" class="btn btn-danger mt-3 mx-2">ย้อนกลับ</a>
                                  </div>
                              </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
@endsection