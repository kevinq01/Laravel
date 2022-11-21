import React, {useEffect, useState} from 'react'
import axios from 'axios'
import { useNavigate, useParams } from 'react-router-dom'


const endpoint = 'http://127.0.0.1:8000/api/product';

const EditProduct = () => {

  const [description, setDescription] = useState('');
  const [price, setPrice] = useState(0);
  const [stock, setStock] = useState(0);
  const navigate = useNavigate();
  const {id} = useParams();

  const update = async (e) => {
    e.preventDefault();
    await axios.put(`${endpoint}/${id}`, {description: description, price: price, stock: stock});

    navigate('/');

  }

  const getProductById = async () => {
    fetch(`${endpoint}/ ${id}`, {
      method: 'GET',
      headers: { 'Content-Type': 'application/json;charset=utf-8' }
      })
      .then(res => res.json())
      .then(data => { 
        setDescription(data.description);
        setPrice(data.price);
        setStock(data.stock); 
      })
  }

  useEffect( () => {
    getProductById();

  }, [] )

  return (
    <div>
      <h3>Edit Product</h3>
      <form onSubmit={update}>
        <div className='m-3'>
          <label className='form-label'>Description</label>
          <input value={description} onChange={ (e) => setDescription(e.target.value)} type='text' className='form-control' />

          <label className='form-label'>Price</label>
          <input value={price} onChange={ (e) => setPrice(e.target.value)} type='number' className='form-control' />

          <label className='form-label'>Stock</label>
          <input value={stock} onChange={ (e) => setStock(e.target.value)} type='number' className='form-control' />

          <button type='submit' className='btn btn-primary'>Update</button>
        </div>
      </form>
    </div>
  )
}

export default EditProduct