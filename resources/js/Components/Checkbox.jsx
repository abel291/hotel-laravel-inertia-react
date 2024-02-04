export default function Checkbox({ className = '', ...props }) {
    return (
        <input
            {...props}
            type="checkbox"
            className={
                'rounded border-gray-300 text-primary-700 focus:ring-primary-700 ' +
                className
            }
        />
    );
}
