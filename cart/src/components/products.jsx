import React, { Component } from "react";
import Product from "./product";

class Products extends Component {
  render() {
    console.log(this.props.products);
    return (
      <React.Fragment>
        {this.props.products.map(item => (
          <Product key={item.id} item={item} />
        ))}
      </React.Fragment>
    );
  }
}

export default Products;
