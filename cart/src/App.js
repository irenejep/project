import React, { Component } from "react";
import logo from "./logo.svg";
import "./App.css";
import NavBar from "./components/navbar";
import Products from "./components/products";

class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
      items: [],
      isLoaded: false
    };
  }
  componentDidMount() {
    this.fetchData();
  }
  fetchData() {
    //   fetch("https://ecommerce-caroline.azurewebsites.net/buyers/showJson")
    //     .then(response => response.json())
    //     .then(json => {
    this.setState({
      isLoaded: true,
      items: [
        {
          id: 1,
          product_image: "phone2.jfif",
          product_id: 1,
          created_at: "2018-09-20 13:00:59",
          updated_at: "2018-09-20 13:00:59",
          product_name: "blackberry",
          product_status: 1,
          product_price: 10000,
          user_id: 2,
          category_id: 2,
          product_description: "lasts with charge",
          product_image_id: null
        },
        {
          id: 2,
          product_image: "heels.jpg",
          product_id: 2,
          created_at: "2018-09-20 13:03:45",
          updated_at: "2018-09-20 13:03:45",
          product_name: "heels",
          product_status: 1,
          product_price: 2000,
          user_id: 2,
          category_id: 4,
          product_description: "executive look",
          product_image_id: null
        },
        {
          id: 3,
          product_image: "akala.jfif",
          product_id: 3,
          created_at: "2018-09-20 13:06:39",
          updated_at: "2018-09-20 13:06:39",
          product_name: "akala",
          product_status: 1,
          product_price: 300,
          user_id: 3,
          category_id: 5,
          product_description: "for watching animals",
          product_image_id: null
        }
      ]
    });
  }
  render() {
    var { isLoaded, items } = this.state;
    return (
      <React.Fragment>
        <NavBar totalCounters={this.state.items.length} />
        <Products products={this.state.items} />
      </React.Fragment>
    );
  }
}

export default App;
