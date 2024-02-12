export default function Checkbox({ name, className = '', ...props }) {
    return (
        <input
            id={name}
            name={name}
            {...props}
            type="checkbox"
            className={
                'rounded border-gray-300 text-primary-700 focus:ring-primary-700 ' +
                className
            }
        />
    );
}
