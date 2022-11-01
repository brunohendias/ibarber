let newValue: string[]
const formaters = {
    data: (value: string): string => {
        newValue = value.split(' ')
        newValue[0] = newValue[0].split('-').reverse().toString().replace(/,/g, '/')
        newValue[1] = newValue[1].slice(0, 5)
        return newValue.toString().replace(',', ' ')
    }
}

export { formaters }