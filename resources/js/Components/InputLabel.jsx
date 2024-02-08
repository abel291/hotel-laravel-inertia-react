export default function InputLabel({ value, className = '', children, ...props }) {
    return (
        <label {...props} className={`input-label ` + className}>
            {value ? value : children}
        </label>
    );
}
