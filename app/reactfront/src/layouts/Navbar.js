import React from 'react'
import { Container, Nav, Navbar } from 'react-bootstrap';
import { Outlet, Link } from 'react-router-dom';

//Ponemos navbar1 porque navbar ya existe y asi no nos da problemas
const Navbar1 = () => {
  return (
    <>
        <Navbar className='navBg' bg="light" expand="lg">
            <Container>
                <Navbar.Brand as={Link} to='/'>Productos</Navbar.Brand>
                <Navbar.Toggle aria-controls="basic-navbar-nav" />
                <Navbar.Collapse id="basic-navbar-nav">
                    <Nav className="me-auto">
                        <Nav.Link as={Link} to='/'>Home</Nav.Link>
                        <Nav.Link as={Link} to='/about'>About</Nav.Link>
                        <Nav.Link as={Link} to='/contact'>Contact</Nav.Link>
                    </Nav>
                </Navbar.Collapse>
            </Container>
        </Navbar>

        
    </>
  )
}

export default Navbar1