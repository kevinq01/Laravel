import React, {useEffect, useState} from 'react'
import axios from 'axios'
import { useNavigate } from 'react-router-dom'
import { Button } from 'bootstrap'

const endpoint = 'http://127.0.0.1:8000/api/products/';

const CreateProduct = () => {

  const [description, setDescription] = useState('');
  const [price, setPrice] = useState(0);
  const [stock, setStock] = useState(0);

  const navigate = useNavigate();

  const store = async (e) => {
    e.preventDefault();
    await axios.post(endpoint, {description: description, price: price, stock: stock});
    window.location.reload(true);

  }

  return (
    <div className='m-2'>
      <h3>Crear Producto</h3>
      <form onSubmit={store}>
        <div className='m-3'>
          <label className='form-label'>Descripcion</label>
          <input value={description} onChange={ (e) => setDescription(e.target.value)} type='text' className='form-control' />

          <label className='form-label'>Precio</label>
          <input value={price} onChange={ (e) => setPrice(e.target.value)} type='number' className='form-control' />

          <label className='form-label'>Stock</label>
          <input value={stock} onChange={ (e) => setStock(e.target.value)} type='number' className='form-control' />

          <button type='submit' className='btn btn-success mt-3'>Crear</button>
        </div>
      </form>
    </div>
  )
}

export default CreateProduct