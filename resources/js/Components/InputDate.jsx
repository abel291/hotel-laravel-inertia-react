import React from 'react'
import Flatpickr from "react-flatpickr";
import "flatpickr/dist/themes/material_blue.css";
import { Spanish } from "flatpickr/dist/l10n/es.js"
const InputDate = ({ options, ...props }) => {


    return (
        <Flatpickr
            {...props}
            options={{
                altInput: true,
                altFormat: "D d M Y",
                dateFormat: "Y-m-d",
                locale: Spanish,
                firstDayOfWeek: 1,
                ...options
            }}

        />
    )
}

export default InputDate
