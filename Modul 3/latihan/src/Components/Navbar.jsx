import React from "react";
import { Link } from "react-router-dom";

const Navbar = () => {
  return (
    <>
      <h3>Navbar</h3>
      <ul>
        <li>
          <Link to="/">
            <button type="button">Home</button>
          </Link>
        </li>
        <li>
          <Link to="/About">
            <button type="button">About Us</button>
          </Link>
        </li>
        <li>
          <Link to="/Contact">
            <button type="button">Contact</button>
          </Link>
        </li>
      </ul>
    </>
  );
};

export default Navbar;
