import React, { Component } from "react";

class Product extends Component {
  render() {
    return (
      <React.Fragment>
        {/* <p>{this.props.item.product_name}</p>
            <p>{this.props.item.product_price}</p> */}
        <div className="row">
          <div className="col-md-8">
            <div className="col-sm-4">
              <a href="#">
                <div> {this.props.item.product_image} </div>{" "}
              </a>
              <h4>{this.props.item.product_name}</h4>
              <p>{this.props.item.product_price}</p>
            </div>
            <button className="btn btn-primary">Add to Cart</button>
          </div>
          <div className="col md-4" />
        </div>
      </React.Fragment>
    );
  }
}

export default Product;
