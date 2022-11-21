import './App.css';
import { BrowserRouter, Navigate, Routes, Route } from 'react-router-dom';
import About from './vistas/About';
import Contact from './vistas/Contact';
import Home from './vistas/Home';
import NavBarExample from './layouts/Navbar';

import ShowProducts from './components/ShowProducts';
import CreateProduct from './components/CreateProduct';
import EditProduct from './components/EditProduct';


function App() {
  return (
    <div className="App">
      

      <BrowserRouter>
      <NavBarExample />
        <Routes>
              <Route path='/' element={ <Home /> } />
                  <Route path='/create' element={ <CreateProduct/> }/>
                  <Route path='/edit/:id' element={ <EditProduct/> }/>

              <Route path='/about' element={ <About /> } />
              <Route path='/contact' element={ <Contact /> } />\
              

              <Route path='*' element={ <Navigate replace to='/' /> }/>
            
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
