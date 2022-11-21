import React, {useEffect, useState} from 'react'
import axios from 'axios'

import {Link} from 'react-router-dom'
import { Button } from 'bootstrap'
import CreateProduct from './CreateProduct'

// constante global
const endpoint = 'http://127.0.0.1:8000/api'

const ShowProducts = () => {
    //Las constantes funcionan asi: products es la variable y setproducts es una funcion que sirve para actualizar dicha variable 
    const [ products, setProducts ] = useState([])

    //Contador
    //const [ count, setCount ] = useState([])

    useEffect ( ()=>{
        getAllProducts()

    }, [])

    const getAllProducts = () => {
        fetch(`${endpoint}/products`, {
            method: 'GET',
            headers: { 'Content-Type': 'application/json;charset=utf-8' }
            })
            .then(res => res.json())
            .then(data => { setProducts(data) })
       
    }

    const deleteProduct = async (id) => {
        await fetch(`${endpoint}/product/${id}`, {
            method: 'DELETE',
            headers: { 'Content-Type': 'application/json;charset=utf-8' }
            })

        getAllProducts()
    }

  return (
    <div>
        <div className='row'>

            <button className='btn btn-success btn-lg m-2 text-white col-10 mx-auto' data-bs-toggle="modal" data-bs-target="#nuevo">Crear</button>

            <div className="modal" id="nuevo">
                <div className="modal-dialog">
                    <div className="modal-content px-2 text-dark">
                        <CreateProduct />
                    </div>
                </div>
            </div>
        </div>

        <div className="card shadow mt-2 mb-2">
            <div className="card-body text-dark">
                <div className="table-responsive">
                    <table className="table table-striped table-bordered text-dark" id="dataTable" width="100%">
                        <thead className='bg-primary text-white'>
                            <tr>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            { products.map( (vt_product) => (
                                <tr key={vt_product.id}>
                                    <td>{vt_product.description}</td>
                                    <td>{vt_product.price}</td>
                                    <td>{vt_product.stock}</td>
                                    <td>
                                        <Link to={`/edit/${vt_product.id}`} className='btn btn-warning'>Editar</Link>
                                        <button onClick={ ()=>deleteProduct(vt_product.id) } className='btn btn-danger'>Eliminar</button>
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  )
}

export default ShowProducts