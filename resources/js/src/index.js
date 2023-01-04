import React from "react";
import ReactDOM from "react-dom/client";
import App from "./App";

const rootTag = document.getElementById("root");

if (rootTag) {
    const root = ReactDOM.createRoot(rootTag);
    root.render(
        <React.Fragment>
            <App />
        </React.Fragment>
    );
}
